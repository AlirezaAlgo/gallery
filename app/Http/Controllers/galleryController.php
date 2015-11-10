<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class galleryController extends CrudController{

    public function all($entity){
        parent::all($entity); 


			$this->filter = \DataFilter::source(new \App\Gallery);
			$this->filter->add('title', 'Title', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('title', 'Title');
			$this->grid->add('image', 'Image');
			$this->addStylesToGrid();


                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);


			$this->edit = \DataEdit::source(new \App\Gallery());

			$this->edit->label('Edit Gallery');

			$this->edit->add('title', 'Title', 'text');

			$this->edit->add('subtitle', 'Subtitle', 'text');
		
			$this->edit->add('image', 'Image', 'file')->rule('required');



       
        return $this->returnEditView();
    }    
}
