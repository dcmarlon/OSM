<?php

function btn_edit ($uri)
{
	return anchor($uri, '<i class="icon-edit"></i>');
}

function btn_editTwo ($uri)
{
	return anchor($uri, '<button class="tiny ui green button">Edit</button>');
}

function btn_editThree ($uri)
{
	return anchor($uri, '<button class="tiny ui button">View</button>');
}
function btn_backd ($uri)
{
	return anchor($uri, '<button class="tiny ui button">Back</button>');
}

function btn_report ($uri)
{
	return anchor($uri, '<button class="tiny ui blue button"> View Result</button>');
}

function btn_editFour ($uri)
{
	return anchor($uri, '<button class="tiny ui green button"></button>');
}

function btn_back ($uri)
{
	return anchor($uri, '<button class="tiny ui button">View</button>');
}

function btn_survey($uri)
{
	return anchor($uri, '<i class="icon-hand-right"></i>');
}


function btn_delete ($uri)
{
	return anchor($uri, '<i class="icon-remove"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
	));
}