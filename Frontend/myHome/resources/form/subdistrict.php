<?
    namespace resources\form;

    class subdistrict {
        public static function getFormField()
        {
            $form[] = 
                [
                    'field'=>'sub_district_id',
                    'title'=>'#',
                    'db_type'=>'string',
                    'required'=> 1,
                    'sortable'=> 1,
                    'show_in_search'=> 1,
                    'show_in_list'=> 1,
                    'searchArea_class'=>'col-md-3',
                    'newModal_class'=>'col-md-6',
                    'sub_search'=> 0
                ];
            $form[] = 
                [
                    'field'=> 'cName',
                    'title'=>'Chi. Name',
                    'db_type'=>'string',
                    'required'=>1,
                    'sortable'=>1,
                    'show_in_search'=>1,
                    'show_in_list'=>1,
                    'searchArea_class'=>'col-md-3',
                    'newModal_class'=>'col-md-6',
                    'sub_search'=>0
                ];
            $form[] = 
                [
                    'field'=> 'eName',
                    'title'=>'Eng. Name',
                    'db_type'=>'string',
                    'required'=>1,
                    'sortable'=>1,
                    'show_in_search'=>1,
                    'show_in_list'=>1,
                    'searchArea_class'=>'col-md-3',
                    'newModal_class'=>'col-md-6',
                    'sub_search'=>0
                ];    
            

            return $form;
        }
    }
?>