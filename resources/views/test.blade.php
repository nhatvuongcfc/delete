@extends('templates.admin')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>



<div class="container">


    <h1>Laravel 5 Autocomplete using Bootstrap Typeahead JS</h1>   

    <div id="the-basics">
        <input class="typeahead" type="text" placeholder="States of USA">
      </div>

</div>


@endsection
@section('js')
    
<script type="text/javascript">

var country_list = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla"];

$(document).ready(function() {

// Set the Options for "Bloodhound" Engine
var my_Suggestion_class = new Bloodhound({
	limit: 10,
	datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
	queryTokenizer: Bloodhound.tokenizers.whitespace,
	local: $.map(country_list, function(item) {
		return {value: item};
	})
});

//Initialize the Suggestion Engine
my_Suggestion_class.initialize();

var typeahead_elem = $('.typeahead');
typeahead_elem.typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},
	{
		name: 'value',
		displayKey: 'value',
		source: my_Suggestion_class.ttAdapter(),
		templates: {
			empty: [
				'<div class="noitems">',
				'No Items Found',
				'</div>'
			].join('\n')
	}
});
});


</script>
@endsection