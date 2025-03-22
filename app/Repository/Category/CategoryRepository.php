<?php

namespace App\Repository\Category;

use App\Interfaces\Category\CategoryRepositoryInterface;
use App\Models\Category;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoryRepository implements CategoryRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $categories = Category::get();
        return view('Dashboard.Admin.Category.index', compact('categories'));
    }

    public function create()
    {  $categories = Category::get();
        return view('Dashboard.Admin.Category.add', compact('categories'));
    }


    public function store($request)
    {
        DB::beginTransaction();
        try {
           
            $category = new Category();
    
          
            $category->name = $request->name;
            $category->description = $request->description;  
            $category->status = $request->status ?? 1;  
            $category->parent_id = $request->parent_id; 
    
            
            $category->save();
    
          
            if ($request->has('schedules')) {
                foreach ($request->schedules as $day => $times) {
                    if ($times['start'] && $times['end']) {
                        $category->schedules()->create([
                            'day' => $day,
                            'start_time' => $times['start'],
                            'end_time' => $times['end'],
                        ]);
                    }
                }
            }
    
          
            $this->verifyAndStoreImage($request, 'photo', 'Category', 'upload_image', $category->id, 'App\Models\Category');
    
           
            DB::commit();
    
           
            session()->flash('add');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    
    public function edit($id)
    {
        $Category = Category::findOrFail($id);
        return view('Dashboard.Admin.Category.edit', compact('Category'));
    }


    public function update($request)
    {
        DB::beginTransaction();
        try {
            $Category = Category::findOrFail($request->id);
            $Category->email = $request->email;
            $Category->section_id = $request->section_id;
            $Category->phone = $request->phone;
            $Category->save();

            $Category->name = $request->name;
            $Category->save();

            foreach ($request->schedules as $day => $times) {
                if (isset($times['cancel'])) {
                    $schedule = $Category->schedules()->firstWhere('day', $day);
                    if ($schedule) {
                        Schedule::destroy($schedule->id);
                    }
                } elseif ($times['start'] && $times['end']) {
                    $schedule = $Category->schedules()->firstWhere('day', $day);
                    if ($schedule) {
                        $schedule->update([
                            'start_time' => $times['start'],
                            'end_time' => $times['end'],
                        ]);
                    } else {
                        $Category->schedules()->create([
                            'day' => $day,
                            'start_time' => $times['start'],
                            'end_time' => $times['end'],
                        ]);
                    }
                }
            }


            if ($request->has('photo')) {
                // Delete old photo
                if ($Category->image) {
                    $old_img = $Category->image->filename;
                    $this->Delete_attachment('upload_image', 'Category/' . $old_img, $request->id);
                }
                //Upload img
                $this->verifyAndStoreImage($request, 'photo', 'Category', 'upload_image', $request->id, 'App\Models\Category');
            }

            DB::commit();
            session()->flash('edit');
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        if ($request->page_id == 1) {
            if ($request->filename) {
                $this->Delete_attachment('upload_image', 'Category/' . $request->filename, $request->id);
            }
            Category::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('categories.index');
        }
    }

    public function update_status($request)
    {
        try {
            $Category = Category::findOrFail($request->id);
            $Category->update([
                'status' => $request->status
            ]);
            session()->flash("edit");
            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
