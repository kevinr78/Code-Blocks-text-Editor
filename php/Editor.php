<?php
session_start();
if (isset($_COOKIE['email']) ) {
     /* Setting Super GLobal Variables */
  $_SESSION['email'] = $_COOKIE['email'];
  
}
?> 

<!DOCTYPE html>
<html>
  <head>
    <title> Text Editor </title>
    <link rel="stylesheet" href="../css/Editor.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script
      src="https://kit.fontawesome.com/0000f17b81.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
   <!-- NAVBAR WITH LINKS -->
    <nav>
      <div class="logo-container">
        <h3>Code-Blocks</h3>
      </div>
      <!-- TOGGLE PANELS CONTAINER -->
      <div class="toggle-panel-wrapper">
      <!-- PANEL BUTTONS -->
        <ul class="nav-links">
          <div class="nav-link active" onclick="togglePanel(this)" id="Html">
            HTML
          </div>
          <div class="nav-link" onclick="togglePanel(this)" id="Css">CSS</div>
          <div class="nav-link" onclick="togglePanel(this)" id="Js">
            JAVASCRIPT
          </div>
          <div class="nav-link active" onclick="togglePanel(this)" id="Output">
            OUTPUT
          </div>
        </ul>
      </div>
    <!-- NAV DROPDOWN MENU -->
      <div class="menu-button">
        <button id="menu-button">
          <i class="fas fa-bars fa-lg" style="margin-right: 3px"></i>Menu
        </button>
        <div class="menu-button-dropdown">
          <button
            onclick="SaveCode()"
            type="submit"
            id="save-code-btn"
            name="save-code"
          >
            Save Code
          </button>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    </nav>
  <!-- MAIN EDITOR CONTAINER -->
    <main>
      <form id="myform" method="post">
        <div id="bodyContainer">
        <!--  LANGUAGE PANELS -->
          <div class="Panels" id="HtmlPanel">
            <textarea
              id="html"
              name="html"
              placeholder=" ENTER HTML CODE HERE"
            ></textarea>
          </div>
          <div class="Panels hidden" id="CssPanel">
            <textarea
              id="css"
              name="css"
              placeholder=" ENTER CSS CODE HERE"
            ></textarea>
          </div>
          <div class="Panels hidden" id="JsPanel">
            <textarea
              id="js"
              name="js"
              placeholder=" ENTER JAVASCRIPT HERE"
            ></textarea>
          </div>
        <!-- OUTPUT CONTAINER -->
          <iframe class="Panels" id="OutputPanel" placeholder="Output"></iframe>
        </div>
      </form>

    
    </main>

    <script type="text/javascript">
    /* INITIALIZING VARIABLES */
      var html = document.getElementById("html");
      var css = document.getElementById("css");
      var js = document.getElementById("js");

      /* TOGGLING PANELS FUNCTION */
      function togglePanel(x) {
        var PanelName = x.id + "Panel";
        x.classList.toggle("active");
        var mainPanel = document.getElementById(PanelName);
        mainPanel.classList.toggle("hidden");
      }
      /* DISPLAY OUTPUT IN IFRAME */
      function compile(html, css, js) {
        var code = document.getElementById("OutputPanel").contentWindow
          .document;

        document.body.onkeyup = function () {
          code.open();
          code.writeln(
            html.value +
              "<style>" +
              css.value +
              "</style>" +
              "<script>" +
              js.value +
              "<\/script>"
          );
          code.close();
        };
      }
      compile(html, css, js);

        /* SAVE CODE FUNCTION */
      function SaveCode() {
        const requestData = {
          html: document.getElementById("html").value,
          css: document.getElementById("css").value,
          js: document.getElementById("js").value,
        };
        /* CONVERTING TO JSON FORMAT */
        const data = JSON.stringify(requestData);
        /* AJAX REQUEST */
        const request = new XMLHttpRequest();
         request.onreadystatechange = function () {
          // Check if the request is compete and was successful
          if (this.readyState === 4 && this.status === 200) {
            alert(this.responseText);
          }
        };
        request.open("post", "SaveCode.php",true);
        request.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        request.send("textareaValue="+data);
      }
    </script>
  </body>
</html>