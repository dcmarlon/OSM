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
	return anchor($uri, '<button class="tiny ui blue button"><i class="bar chart icon"></i>View Result</button>');
}

function btn_back ($uri)
{
	return anchor($uri, '<button class="tiny ui button">View</button>');
}

