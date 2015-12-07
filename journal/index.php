
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>WideArea - Better Textarea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create expandable textarea and write large amount of text easily">
    <meta name="author" content="Afshin Mehrabani (@afshinmeh)">

    <!-- CSS -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="speech-input.css" rel="stylesheet">
    <script type="text/javascript" src="widearea.js?v030"></script>
    <link href="widearea.css?v030" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      textarea {
        height: 100px;
        width:100%;
        max-width: 100%;
        box-sizing:border-box;
        margin:0;
        border: 1px solid #ddd;
        border-radius: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        resize: none;
      }

      #widearea-container {
        border: 5px solid #eee;
        border-radius: 2px;
        box-shadow: 0px 1px 1px #ddd;
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 680px;
      }
      .container .credit {
        margin: 20px 0;
      }
      .detail-widearea {
        margin-top: 50px;
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        -ms-transition: all 0.2s ease-out;
        -o-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
      }

    </style>

  </head>
  <body>
    <div id="wrap">
      <div class="container">
        <div class="page-header">
          <h1 style="font-weight: normal;" class="pull-left"><strong>Wide</strong>Area</h1>
          <div class="clearfix"></div>
        </div>
        <p class="lead">Start typing and then click on the top-right icon.</p>

        <div id="widearea-container">
	          <textarea placeholder="Type something..." data-widearea="enable" id="si-input"></textarea>
	            <button id="si-btn">
				    speech input
				</button>
        </div>
       	<form action="submit.php" method="post">
       		<button id="submit">
				submit
			</button>
       	</form>
      </div>
      <div id="push">
      </div>
    </div>
    <div id="txtHint">THE TEXT WILL BE HERE</div>
    <script type="text/javascript">
      wideArea();
    </script>

    <script src="speech-input.js"></script>

  </body>
</html>

