<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Circular;
use App\Models\Forms;
use App\Models\Comments;
use Illuminate\Support\Facades\Storage;
use App\Models\AnnualReport;
use Illuminate\Support\Facades\Auth;


class CircularController extends Controller {


   public function index() {
    $circulars = Circular::orderBy('created_at', 'desc')->get();
    $forms = Forms::orderBy('created_at', 'desc')->get();
    $comments = Comments::orderBy('created_at', 'desc')->get();
    $annualReport = AnnualReport::orderBy('created_at', 'desc')->get();

    return view('adminpanel.circulars.index', compact('circulars', 'forms', 'comments', 'annualReport'));
}


 public function formindex() {
    $circulars = Circular::orderBy('created_at', 'desc')->get();
    $forms = Forms::orderBy('created_at', 'desc')->get();
    $comments = Comments::orderBy('created_at', 'desc')->get();
    $annualReport = AnnualReport::orderBy('created_at', 'desc')->get();

    return view('adminpanel.circulars.form', compact('circulars', 'forms', 'comments', 'annualReport'));
}

 public function annualindex() {
    $circulars = Circular::orderBy('created_at', 'desc')->get();
    $forms = Forms::orderBy('created_at', 'desc')->get();
    $comments = Comments::orderBy('created_at', 'desc')->get();
    $annualReport = AnnualReport::orderBy('created_at', 'desc')->get();

    return view('adminpanel.circulars.annual', compact('circulars', 'forms', 'comments', 'annualReport'));
}

 public function commentsindex() {
    $circulars = Circular::orderBy('created_at', 'desc')->get();
    $forms = Forms::orderBy('created_at', 'desc')->get();
    $comments = Comments::orderBy('created_at', 'desc')->get();
    $annualReport = AnnualReport::orderBy('created_at', 'desc')->get();

    return view('adminpanel.circulars.comments', compact('circulars', 'forms', 'comments', 'annualReport'));
}

public function viewPdf($id)
{
    if (!Auth::check()) {
        return redirect()->route('MemberLogin', ['redirect_url' => url()->current()]);
    }

    // Fetch the circular
   $circular = Circular::findOrFail($id);

    // Define correct file path
    $filePath = storage_path('app/public/' . $circular->pdf);

    // Check if file exists
    if (!file_exists($filePath)) {
        abort(404, 'File not found');
    }

    // Serve the file securely
    return response()->file($filePath);
}

public function commentsview($id)
{
    if (!Auth::check()) {
        return redirect()->route('MemberLogin', ['redirect_url' => url()->current()]);
    }

    // Fetch the circular
     $comments = Comments::findOrFail($id);

    // Define correct file path
    $filePath = storage_path('app/public/' . $comments->pdf);

    // Check if file exists
    if (!file_exists($filePath)) {
        abort(404, 'File not found');
    }

    // Serve the file securely
    return response()->file($filePath);
}



    public function create() {
        //return view('adminpanel.circulars.create');
    }
    public function store(Request $request) {
       
       $request->validate([
        'name' => 'required|string|max:255',
        'pdf' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        'status' => 'required|in:active,inactive',
        'link' => 'nullable|string'
    ]);

        // Store file with original name
        $pdfPath = $request->file('pdf')->storeAs('circulars', time().'_'.$request->file('pdf')->getClientOriginalName(), 'public');

        Circular::create([
            'name' => $request->name,
            'pdf' => $pdfPath,
            'link' => $request->link,
            'is_new' => $request->has('latest') ? 1 : 0,

            'status' => $request->status
        ]);

        return redirect()->route('circular.index')->with('success', 'Circular added successfully!');
    }


 public function commentsstore(Request $request) {
       // dd($request);
       $request->validate([
        'name' => 'required|string|max:255',
        'pdf' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        'status' => 'required|in:active,inactive',
        'link' => 'nullable|string'
    ]);

        // Store file with original name
        $pdfPath = $request->file('pdf')->storeAs('comments', time().'_'.$request->file('pdf')->getClientOriginalName(), 'public');

        Comments::create([
            'name' => $request->name,
            'pdf' => $pdfPath,
            'link' => $request->link,
            'status' => $request->status
        ]);

        return redirect()->route('circular.commentsindex')->with('success', 'Representations / Comments added successfully!');
    }
    public function formstore(Request $request) {
      
        $request->validate([
         'name' => 'required|string|max:255',
         'pdf' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
         'status' => 'required|in:active,inactive',
         'link' => 'nullable|string'
     ]);
 
         // Store file with original name
         $pdfPath = $request->file('pdf')->storeAs('Forms', time().'_'.$request->file('pdf')->getClientOriginalName(), 'public');
 
         Forms::create([
             'name' => $request->name,
             'pdf' => $pdfPath,
             'link' => $request->link,
             'status' => $request->status
         ]);
 
         return redirect()->route('circular.formindex')->with('success', 'Forms added successfully!');
     }
     


     public function formUpdate(Request $request, $id)
     {
         // Validate request
         $request->validate([
             'name' => 'required|string|max:255',
             'pdf' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
             'status' => 'required|in:active,inactive',
         ]);
     
         // Find the form by ID
         $form = Forms::findOrFail($request->id);
     
         // Handle file upload
         if ($request->hasFile('pdf')) {
             // Delete old file if exists
             if ($form->pdf) {
                 Storage::disk('public')->delete($form->pdf);
             }
     
             // Store new file with timestamp + original name
             $pdfPath = $request->file('pdf')->storeAs(
                 'forms',
                 time() . '_' . $request->file('pdf')->getClientOriginalName(),
                 'public'
             );
     
             $form->pdf = $pdfPath;
         }
     
         // Update form details
         $form->update([
             'name' => $request->name,
             'status' => $request->status,
         ]);
     
         return response()->json(['success' => true, 'message' => 'Form updated successfully!']);
     }
     



      public function annualreportstore(Request $request) {
         //dd($request);
        $request->validate([
         'name' => 'required|string|max:255',
         'pdf' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
         'status' => 'required|in:active,inactive',
         'link' => 'nullable|string'
     ]);
 
         // Store file with original name
         $pdfPath = $request->file('pdf')->storeAs('AnnualReports', time().'_'.$request->file('pdf')->getClientOriginalName(), 'public');
 
         AnnualReport::create([
             'name' => $request->name,
             'pdf' => $pdfPath,
             'link' => $request->link,
             'status' => $request->status
         ]);
 
         return redirect()->route('circular.annualindex')->with('success', 'AnnualReports added successfully!');
     }



     public function annualUpdate(Request $request, $id)
     {
      
         $request->validate([
             'name' => 'required|string|max:255',
             'pdf' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
             'status' => 'required|in:active,inactive',
         ]);
     
         // Find the form by ID
         $form = AnnualReport::findOrFail($request->id);
     
         // Handle file upload
         if ($request->hasFile('pdf')) {
             // Delete old file if exists
             if ($form->pdf) {
                 Storage::disk('public')->delete($form->pdf);
             }
     
             // Store new file with timestamp + original name
             $pdfPath = $request->file('pdf')->storeAs(
                 'AnnualReports',
                 time() . '_' . $request->file('pdf')->getClientOriginalName(),
                 'public'
             );
     
             $form->pdf = $pdfPath;
         }
     
         // Update form details
         $form->update([
             'name' => $request->name,
             'status' => $request->status,
         ]);
     
         return response()->json(['success' => true, 'message' => 'Annual Report updated successfully!']);
     }

    public function show(Circular $circular) {
        return view('adminpanel.circulars.show', compact('circular'));
    }

    public function edit(Circular $circular) {
        return view('adminpanel.circulars.edit', compact('circular'));
    }

    public function update(Request $request, Circular $circular) {

        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
            'status' => 'required|in:active,inactive',
            'link' => 'nullable|string',
            'latest' => 'nullable|boolean'
        ]);
    
        // Handle file upload
        if ($request->hasFile('pdf')) {
            // Delete old file if exists
            if ($circular->pdf) {
                Storage::disk('public')->delete($circular->pdf);
            }
    
            // Store new file with timestamp + original name
            $pdfPath = $request->file('pdf')->storeAs(
                'circulars', 
                time().'_'.$request->file('pdf')->getClientOriginalName(), 
                'public'
            );
    
            $circular->pdf = $pdfPath;
        }
    
        // Update other fields
        $circular->update([
            'name' => $request->name,
            'link' => $request->link,
            'status' => $request->status,
            'latest' => $request->has('latest') ? 1 : 0, 
        ]);
    
        return response()->json(['success' => true, 'message' => 'Circular updated successfully!']);
    }
    

    public function destroy(Circular $circular) {
        // Delete the associated file if it exists
        if ($circular->pdf && Storage::disk('public')->exists($circular->pdf)) {
            Storage::disk('public')->delete($circular->pdf);
        }
    
        // Delete the circular record
        $circular->delete();
    
        // Redirect to the correct route name
        return redirect()->route('circular.index')->with('success', 'Circular deleted successfully!');
    }
    
    public function formdestroy($id) {
        // Find the form by ID
        $form = Forms::findOrFail($id);
    
        // Delete the associated PDF file if it exists
        if ($form->pdf && Storage::disk('public')->exists($form->pdf)) {
            Storage::disk('public')->delete($form->pdf);
        }
    
        // Delete the form record
        $form->delete();
    
        // Return JSON response for AJAX or redirect for normal requests
        return redirect()->route('circular.formindex')->with('success', 'Form deleted successfully!');
    }
    


    public function annualdestroy($id) {
    
        $form = AnnualReport::findOrFail($id);
    
        
        if ($form->pdf && Storage::disk('public')->exists($form->pdf)) {
            Storage::disk('public')->delete($form->pdf);
        }
    
       
        $form->delete();
    
       
        return redirect()->route('circular.annualindex')->with('success', 'Annual Report deleted successfully!');
    }
    



    public function commentUpdate(Request $request, $id)
    {

        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
            'status' => 'required|in:active,inactive',
            'link' => 'nullable|string'
        ]);
    
        // Find the form by ID
        $form = Comments::findOrFail($request->id);
    
        // Handle file upload
        if ($request->hasFile('pdf')) {
            // Delete old file if exists
            if ($form->pdf) {
                Storage::disk('public')->delete($form->pdf);
            }
    
            // Store new file with timestamp + original name
            $pdfPath = $request->file('pdf')->storeAs(
                'AnnualReports',
                time() . '_' . $request->file('pdf')->getClientOriginalName(),
                'public'
            );
    
            $form->pdf = $pdfPath;
        }
    
        // Update form details
        $form->update([
            'name' => $request->name,
            'status' => $request->status,
            'link' => $request->link,
        ]);
    
        return response()->json(['success' => true, 'message' => 'Annual Report updated successfully!']);
    }
    public function commentdestroy($id) {
    
        $form = Comments::findOrFail($id);
    
        
        if ($form->pdf && Storage::disk('public')->exists($form->pdf)) {
            Storage::disk('public')->delete($form->pdf);
        }
    
       
        $form->delete();
    
       
        return redirect()->route('circular.commentsindex')->with('success', 'Comments deleted successfully!');
    }
}

