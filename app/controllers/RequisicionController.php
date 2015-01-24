<?php 

class RequisicionController extends BaseController{
	public function index(){
		$requisiciones = Requisicion::all();
		return View::make('requisiciones.index');
	}

	public function create(){
		return View::make('requisiciones.create');
	}

	public function store(){
		$data = Input::all();

		$rules = array(
			'tipo'                       => 'required',
			'descripcion'                => 'required',
			'partida_presupuestal'       => 'required',
			'codificacion'               => 'required',
			'presupuesto'                => 'required',
			'origen_recursos'            => 'required',
			'procedimiento_adjudicacion' => 'required',
			'tiempo_entrega'             => 'required',
			'lugar_entrega'              => 'required',
			'garantia'                   => 'required',
			'asesor'                     => 'required',
			'cargo_asesor'               => 'required',
			'correo_asesor'              => 'required',
			'dias_pago'                  => 'required'
		);

		$messages = array(
		    'required' => 'Campo: :attribute es obligatorio',
		);

		$validator = Validator::make($data, $rules, $messages);

	    if ($validator->fails())
	    {
	        return Redirect::to('requisiciones/create')->withErrors($validator)->withInput(Input::all());
	    }
	    else{
	    	/*
	    	$nueva_requisicion = new Requisicion;

			$nueva_requisicion->id_dependencia             = Input::get('id_dependencia');
			$nueva_requisicion->descripcion                = Input::get('descripcion');
			$nueva_requisicion->partida_presupuestal       = Input::get('partida_presupuestal');
			$nueva_requisicion->codificacion               = Input::get('codificacion');
			$nueva_requisicion->presupuesto                = Input::get('presupuesto');
			$nueva_requisicion->origen_recursos            = Input::get('origen_recursos');
			$nueva_requisicion->procedimiento_adjudicacion = Input::get('procedimiento_adjudicacion');
			$nueva_requisicion->tiempo_entrega             = Input::get('tiempo_entrega');
			$nueva_requisicion->lugar_entrega              = Input::get('lugar_entrega');
			$nueva_requisicion->garantia                   = Input::get('garantia');
			$nueva_requisicion->asesor                     = Input::get('asesor');
			$nueva_requisicion->cargo_asesor               = Input::get('cargo_asesor');
			$nueva_requisicion->correo_asesor              = Input::get('correo_asesor');
			$nueva_requisicion->dias_pago                  = Input::get('dias_pago');
	    	
			*/
	    	return View::make('hello');
	    }
	}

	public function show($id){
		$new = Newm::find($id);
		$photos = unserialize($new->photo1);
		$sizePhotos = sizeof($photos);
		$social = Share::load("http://localhost:8000/noticias/$id", $new->title)->services('facebook', 'gplus', 'twitter', 'gmail');
		return View::make('news.show')->with('new', $new)->with('social', $social)->with('photos', $photos)->with('sizePhotos', $sizePhotos);;
	}

	public function edit($id){
		$news = Newm::find($id);
		return View::make('news.edit')->with('news', $news);
	}

	public function update($id){
		$data = Input::all();

		$rules = array(
			'title'        => 'required',
			'category'     => 'required',
			'author'       => 'required',
			'header'       => 'required',
			'content'      => 'required',
			'published_at' => 'required',
		);

		$validator = Validator::make($data, $rules);

	    if ($validator->fails())
	    {
	        return Redirect::to('noticias/' . $id . '/edit')->withErrors($validator)->withInput(Input::all());
	    }
	    else{
    		$up_new                = Newm::find($id);
			$up_new->title         = Input::get('title');
			$up_new->category      = Input::get('category');
			$up_new->author        = Input::get('author');
			$up_new->second_author = Input::get('second_author');
			$up_new->third_author  = Input::get('third_author');;
			$up_new->header        = nl2br(htmlentities(Input::get('header'), ENT_QUOTES, 'UTF-8'));
			$up_new->content       = nl2br(htmlentities(Input::get('content'), ENT_QUOTES, 'UTF-8'));
			$up_new->published_at  = Input::get('published_at');
	    	
	    	$url = Input::get('video1');
	    	if ($url != '') {
	    		$step1 = explode('v=', $url);
				$step2 = explode('&',$step1[1]);
				$vedio_id = $step2[0];
				$up_new->video1 = $vedio_id;
				
	    	}
	    	$attachments = Input::file('photo1');
	    	if ($attachments) {
	    		$name = str_random(12);
				$pathToFile = "public/images";
				$upload_success = Input::file('photo1')->move($pathToFile, $name);
				$up_new->photo1 = "$pathToFile/$name";
	    	}

	    	if (Input::get('slider') === '1'){
				$up_new->slider    = true;
			}
			else{
				$up_new->slider    = false;
			}
			if (Input::get('titular') === '1'){
				$up_new->titular    = true;
			}
			else{
				$up_new->titular    = false;
			}

	    	$up_new->save();
			Session::flash('message', 'Noticia editada exitosamente');
			return Redirect::to('noticias');
	    }
	}

	public function destroy($id){
		$new = Newm::find($id);
		$new->delete();
		Session::flash('message', 'Noticia borrada exitosamente');
		return Redirect::to('noticias');
	}

	public function newsByCategory($category){
		$category = strtolower($category);
		$photos = array();
		$news = Newm::where('category', $category)->orderBy('id', 'DESC')->paginate(5);
		foreach ($news as $index => $new) {
			$photos[$index] = unserialize($new->photo1);
		}
		return View::make("news.$category")->with('news', $news)->with('photos', $photos);
	}

	public function home(){
		$photoSlider = array();
		$photoTitular = array();
		$newsSlider = Newm::where('slider', true)->orderBy('id', 'DESC')->take(4)->get();
		for ($i=0; $i < 4 ; $i++) { 
			$photoSlider[$i] = unserialize($newsSlider[$i]->photo1);
		}
		$newsTitular = Newm::where('titular', true)->orderBy('id', 'DESC')->take(6)->get();
		for ($i=0; $i < 6 ; $i++) { 
			$photoTitular[$i] = unserialize($newsTitular[$i]->photo1);
		}
		return View::make('news.home')->with('newsSlider', $newsSlider)->with('newsTitular', $newsTitular)->with('photoSlider', $photoSlider)->with('photoTitular', $photoTitular);
	}
}

?>