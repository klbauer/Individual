<?php
include_once("lesson.php");
include_once("lessoncontroller.php");
include_once("../persons/person.php");
include_once("../persons/personcontroller.php");
include_once("../../templates/basetemplate.php");

class Addlesson extends BaseTemplate {
    private $header;
    private $person_options = "";
    private $footer;

    /**
     * Addlesson constructor.
     */
    public function __construct()
    {
        $this->header = parent::get_header("Add a lesson");
        $options = PersonController::get_all_persons_options();

		//Get the options for the users to select.
		foreach ($options as $o) {
			$this->person_options = $this->person_options . $o;
		}

        $this->footer = parent::get_footer();
    }


    public function get_final_page()
    {
        return $this->header .
        "<div class='row'>
			<form class='form-horizontal' action='add.php' method='post'>
				<fieldset>
					<legend>Add a Sale</legend>
					<div class='form-group'>
						<label for='title' class='col-lg-2 control-label'>Title</label>
						<div class='col-lg-10'>
							<input type='text' class='form-control' name='title' id='title' minlength='5' maxlength='49' placeholder='Sale Title'/>
						</div>
					</div>
					<div class='form-group'>
						<label for='subject' class='col-lg-2 control-label'>Dates</label>
						<div class='col-lg-10'>
							<input type='text' class='form-control' name='subject' id='subject' minlength='5' maxlength='49' placeholder='Sale Dates (ex. April 5th - April 7th)'/>
						</div>
					</div>
					<div class='form-group'>
						<label for='description' class='col-lg-2 control-label'>Description</label>
						<div class='col-lg-10'>
							<textarea class='form-control' rows='5' name='description' id='description' minlength='5' maxlength='199'></textarea>
						</div>
					</div>
					<div class='form-group'>
						<label for='person' class='col-lg-2 control-label'>Sale Creator</label>
						<div class='col-lg-10'>
							<select class='form-control' name='person' id='person'>
							    " . $this->person_options . "
							</select>
						</div>
					</div>
					<div class='form-action'>
						<div class='col-lg-10 col-lg-offset-2'>
							<button type='submit' class='btn btn-primary'>Add</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>" . $this->footer;
    }
}

session_start();

//Check if person is logged in.
if (!isset($_SESSION['persons_id'])) {
	$_SESSION['CALLING_PAGE'] = $_SERVER['REQUEST_URI'];
	header("Location: ../login.php");
}

//If post empty, then display the page defined above
if (empty($_POST)) {
	$add_lesson = new Addlesson();

	echo $add_lesson->get_final_page();
	exit;
}
else {
	//Create a lesson object
	$lesson = new lesson($_POST['title'], $_POST['subject'], $_POST['description'], $_POST['resources'],
		$_POST['person'], date('Y-m-d H:i:s'), $_POST['search']);

	//Add them to the database.
	LessonController::add_lesson($lesson);
	header('Location: index.php');
}
?>