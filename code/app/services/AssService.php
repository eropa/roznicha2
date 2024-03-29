<?php


namespace App\services;


use App\Models\Ass;
use App\Models\Grass;
use App\Sostav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Iterable_;
use Illuminate\Support\Str;

class AssService
{
    /**
     * Добовляем группу товара
     * @param Request $request
     * @return bool
     */
    static function createGr(Request $request){
        $company=Auth::user()->getCompany();
        $modelGr=new Grass();
        $modelGr->name=$request->input('name');
        $modelGr->parent_id=$request->input('parent_id');
        $modelGr->visible_ras=$request->input('visible_ras');
        $modelGr->company_id=$company->id;
        if($request->file('image')){
            $file = $request->file('image');
            $roundName=Str::random(10).".". $file->extension();
            $destinationPath = 'groups';
            $file->move($destinationPath,$roundName);
            $modelGr->image=$roundName;
        }
        return $modelGr->save();
    }

    static function updateGr(Request $request){
        $company=Auth::user()->getCompany();
        $dataGr=Grass::where('company_id',$company->id)
            ->where('id',$request->input('id'))
            ->first();
        if(is_null($dataGr)){
            abort(404);
        }
        $modelGr=Grass::find($request->input('id'));
        $modelGr->name=$request->input('name');
        $modelGr->parent_id=$request->input('parent_id');
        $modelGr->visible_ras=$request->input('visible_ras');
        $modelGr->company_id=$company->id;
        if($request->file('image')){
            $file = $request->file('image');
            $roundName=Str::random(10).".". $file->extension();
            $destinationPath = 'groups';
            $file->move($destinationPath,$roundName);
            $modelGr->image=$roundName;
        }
        return $modelGr->save();
    }

    static function deleteGr($id){
        $company=Auth::user()->getCompany();
        $dataGr=Grass::where('company_id',$company->id)
            ->where('id',$id)
            ->first();
        if(is_null($dataGr)){
            abort(404);
        }
        return Grass::destroy($id);
    }


    static function listGrAll(){
        $company=Auth::user()->getCompany();
        $datas=Grass::where('company_id',$company->id)
            ->get();
        return $datas;
    }

    static function listGr(){
        $company=Auth::user()->getCompany();
        $datas=Grass::where('company_id',$company->id)
                ->where('parent_id',0)
                ->get();
        return $datas;
    }

    static function listGrID($id){
        $company=Auth::user()->getCompany();
        $datas=Grass::where('company_id',$company->id)
            ->where('parent_id',$id)
            ->get();
        return $datas;
    }

    static function getGrParentId($id){
        $company=Auth::user()->getCompany();
        $dataGrParent=Grass::where('company_id',$company->id)
            ->where('id',$id)
            ->first();
        return $dataGrParent;
    }

    static function getDataGr($id){
        $company=Auth::user()->getCompany();
        $data=Grass::where('company_id',$company->id)
            ->where('id',$id)
            ->first();
        if(is_null($data)){
            abort(404);
        }
        return $data;
    }


    static function createAss(Request $request){
        $modelAss=new Ass();
        $modelAss->name=$request->input('name');
        $modelAss->barcode=$request->input('barcode');
        $modelAss->grass_id=$request->input('grass_id');
        $modelAss->html_about=$request->input('html_about');
        $modelAss->sostav=(is_null($request->input('sostav'))?0:1);
        return $modelAss->save();
    }

    static function updateAss(Request $request){
        $modelAss=Ass::find($request->input('id'));
        $modelAss->name=$request->input('name');
        $modelAss->barcode=$request->input('barcode');
        $modelAss->grass_id=$request->input('grass_id');
        $modelAss->html_about=$request->input('editorData');
      //  dd($request->input('sostav'));
        $modelAss->sostav=($request->input('sostav')==true?1:0);
        $modelAss->visible_ras=$request->input('visible_ras');
        $modelAss->price=$request->input('price');
        if($request->file('file')){
            $file = $request->file('file');
            $roundName=Str::random(10).".". $file->extension();
            $destinationPath = 'ass_tovar';
            $file->move($destinationPath,$roundName);
            $modelAss->image=$roundName;
        }
        //составной товар добовляем значение
        $delet=Sostav::where('ass_id',$request->input('id'))->delete();
        $arrySostavs=$request->input('sostavass');
        $arrySostavs=json_decode($arrySostavs);
      //  dd($arrySostavs);
        foreach ($arrySostavs as $arrySostav){
            $modelsostav=new Sostav();
            $modelsostav->ass_id=$request->input('id');
            $modelsostav->ass_ssos_id=$arrySostav->id;
            $modelsostav->count=$arrySostav->count;
            $modelsostav->save();
        }
        //
        return $modelAss->save();
    }

    static function listAssGrId($group_id){
        $datas= Ass::where('grass_id',$group_id)->get();
        return $datas;
    }

    static function dataAssId($id){
        $data=Ass::find($id);
        return $data;
    }
    /*
    static function updateAss(Request $request){
        $modelAss=Ass::find($request->input('id'));
        $modelAss->name=$request->input('name');
        $modelAss->barcode=$request->input('barcode');
        $modelAss->grass_id=$request->input('grass_id');
        $modelAss->sostav=(is_null($request->input('sostav'))?0:1);
        return $modelAss->save();
    }*/

    static function deleteAss($id){
        Ass::destroy($id);
    }

    static function getAllAss(){
        $company=Auth::user()->getCompany();
        $datas=Ass::whereIn('asses.grass_id',function ($query) use ($company) {
            $query->select('grasses.id')
                ->from('grasses')
                ->where('grasses.company_id',$company->id);
        })->get();
        return $datas;
    }

    static function getNameId($id){
        $ass=Ass::find($id);
        if(is_null($ass))
            return '-';
        return $ass->name;
    }

}
