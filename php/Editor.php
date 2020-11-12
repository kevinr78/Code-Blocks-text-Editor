<?php
session_start();
if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
  $_SESSION['id'] = $_COOKIE['id'];
  
}
?> 

<!DOCTYPE html>
<html>
  <head>
    <title>Web Compiler</title>
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
    <nav>
      <div class="logo-container">
        <h3>Code-Blocks</h3>
      </div>
      <div class="toggle-panel-wrapper">
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

    <main>
      <form id="myform" method="post">
        <div id="bodyContainer">
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

          <iframe class="Panels" id="OutputPanel" placeholder="Output"></iframe>
        </div>
      </form>

     
    </main>

    <script type="text/javascript">
      var html = document.getElementById("html");
      var css = document.getElementById("css");
      var js = document.getElementById("js");

      function togglePanel(x) {
        var PanelName = x.id + "Panel";
        x.classList.toggle("active");
        var mainPanel = document.getElementById(PanelName);
        mainPanel.classList.toggle("hidden");
      }

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

      function SaveCode() {
        const request = new XMLHttpRequest();

        const requestData = {
          html: document.getElementById("html").value,
          css: document.getElementById("css").value,
          js: document.getElementById("js").value,
        };

        request.onreadystatechange = function () {
          // Check if the request is compete and was successful
          if (this.readyState === 4 && this.status === 200) {
            alert(this.responseText);
          }
        };
        request.open("post", "SaveCode.php", true);
        request.setRequestHeader(
          "Content-type",
          "application/x-www-form-urlencoded"
        );
        request.send(
          "html=" +
            requestData.html +
            "&css=" +
            requestData.css +
            "&js=" +
            requestData.js
        );
      }
    </script>
  </body>
</html>
