<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductsRequest;
use App\Http\Requests\EditProductsRequest;
use App\Http\Requests;
use App\Products;
use App\Category;
use App\Pro_details;
use App\Detail_img;
use Auth;
use DateTime,File,Input,DB;


class ProductsController extends Controller
{
	public function getlist($id)
	{
        if ($id!='all') {
            $pro = Products::where('cat_id',$id)->paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>$id]);                    
        } else {
            $pro = Products::paginate(10);
            $cat= Category::all();
            return view('back-end.products.list',['data'=>$pro,'cat'=>$cat,'loai'=>0]);
        }		
	}
    public function getadd($id)
    {
        $loai = Category::where('id',$id)->first();
        $p_id = $loai->parent_id;
        $p_name = Category::where('id',$p_id)->first();
		$cat= Category::where('parent_id',$p_id)->get();
		$pro = Products::all();	
        if ($p_id >=19) {
                return view('back-end.products.pc-add',['data'=>$pro,'cat'=>$cat,'loai'=>$p_name->name]);
            }
        else {
            return view('back-end.products.add',['data'=>$pro,'cat'=>$cat,'loai'=>$p_name->name]);
        }	
		
		
    }
    public function postadd(AddProductsRequest $rq)
    {
    	$pro = new Products();

    	$pro->name = $rq->txtname;
    	$pro->slug = str_slug($rq->txtname,'-');
    	$pro->intro = $rq->txtintro;
    	$pro->promo1 = $rq->txtpromo1;
    	$pro->promo2 = $rq->txtpromo2;
    	
    	
    	$pro->review = $rq->txtReview;
    	$pro->tag = $rq->txttag;
    	$pro->price = $rq->txtprice;
    	$pro->cat_id = $rq->sltCate;
    	$pro->user_id = Auth::guard('admin')->user()->id;
    	$pro->created_at = new datetime;
    	$pro->status = '1';
    	$f = $rq->file('txtimg')->getClientOriginalName();
    	$filename = time().'_'.$f;
    	$pro->images = $filename;    	
    	$rq->file('txtimg')->move('uploads/products/',$filename);
    	$pro->save();    	
    	$pro_id =$pro->id;

    	$detail = new Pro_details();

    	$detail->thuonghieu = $rq->txtThuonghieu;
    	$detail->sanxuat = $rq->txtSanxuat;
    	$detail->size = $rq->txtSize;
    	
    	$detail->pro_id = $pro_id;

        
        

       

    	$detail->created_at = new datetime;
    	$detail->save();    	

    	if ($rq->hasFile('txtdetail_img')) {
    		$df = $rq->file('txtdetail_img');
    		foreach ($df as $row) {
    			$img_detail = new Detail_img();
    			if (isset($row)) {
    				$name_img= time().'_'.$row->getClientOriginalName();
    				$img_detail->images_url = $name_img;
    				$img_detail->pro_id = $pro_id;
    				$img_detail->created_at = new datetime;
    				$row->move('uploads/products/details/',$name_img);
    				$img_detail->save();
    			}
    		}
		}
	return redirect('admin/sanpham/all')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);    	

    }
    public function getdel($id)
    {
        $detail = Detail_img::where('pro_id',$id)->get();
        foreach ($detail as $row) {                
               $dt = Detail_img::find($row->id);
               $pt = public_path('uploads/products/details/').$dt->images_url; 
               // dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
    	$pro = Products::find($id);
        $pro->delete();
        return redirect('admin/sanpham/all')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
    }
    public function getedit($loai,$id)
    {
        $dt = Products::where('id',$id)->first();
        $c_id= $dt->cat_id;
        $loai= Category::where('id',$c_id)->first();
        $p_id = $loai->parent_id;

    	if ($p_id == 1) {
            $cat= Category::where('parent_id', '1')->get();
            $pro = Products::where('id',$id)->first();
            return view('back-end.products.edit-banhngot',['pro'=>$pro,'cat'=>$cat,'loai'=>'Điện thoại']);    
        } elseif ($p_id ==2) {
            $cat= Category::where('parent_id', 2)->get();
            $pro = Products::where('id',$id)->first();
            return view('back-end.products.edit-banhngot',['pro'=>$pro,'cat'=>$cat,'loai'=>'Laptop']);       
        } elseif ($p_id ==19) {
            $cat= Category::where('parent_id', 19)->get();
            $pro = Products::where('id',$id)->first();
            return view('back-end.products.edit-banhngot',['pro'=>$pro,'cat'=>$cat,'loai'=>$p_id]);     
        }
    }
    public function postedit($loai,$id,EditProductsRequest $rq)
    {
    	$pro = Products::find($id);

        $pro->name = $rq->txtname;
        $pro->slug = str_slug($rq->txtname,'-');
        $pro->intro = $rq->txtintro;
        $pro->promo1 = $rq->txtpromo1;
        $pro->promo2 = $rq->txtpromo2;
        
        $pro->r_intro = $rq->txtre_Intro;
        $pro->review = $rq->txtReview;
        $pro->tag = $rq->txttag;
        $pro->price = $rq->txtprice;
        $pro->cat_id = $rq->sltCate;
        $pro->user_id = Auth::guard('admin')->user()->id;
        $pro->updated_at = new datetime;
        $pro->status = '1';
        $file_path = public_path('uploads/products/').$pro->images;        
        if ($rq->hasFile('txtimg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }
            
            $f = $rq->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $rq->file('txtimg')->move('uploads/products/',$filename);
        }       
        $pro->save(); 
        
        $pro->pro_details->thuonghieu = $rq->txtThuonghieu;
        $pro->pro_details->sanxuat = $rq->txtSanxuat;
        $pro->pro_details->size = $rq->txtSize;
        
        if ($rq->txtSIM =='') {
            $pro->pro_details->sim= 'Không có';
        } else {
            $pro->pro_details->sim = $rq->txtSIM;
        }
       
        if ($rq->txtPin =='') {
            $pro->pro_details->pin= 'Không có';
        } else {
            $pro->pro_details->pin = $rq->txtPin;
        }
        $pro->pro_details->os = $rq->txtOs;
        $pro->pro_details->updated_at = new datetime;        

        if ($rq->hasFile('txtdetail_img')) {
            $detail = Detail_img::where('pro_id',$id)->get();
            $df = $rq->file('txtdetail_img');
            foreach ($detail as $row) {                
               $dt = Detail_img::find($row->id);
               $pt = public_path('uploads/products/details/').$dt->images_url; 
               // dd($pt);   
                if (file_exists($pt))
                {
                    unlink($pt);
                }
               $dt->delete();                              
            }
            
        }
    $pro->pro_details->save();
    return redirect('admin/sanpham/all')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã lưu !']);       
    }
}
