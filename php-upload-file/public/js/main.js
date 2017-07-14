document.getElementById('getInfo').addEventListener('click', getInfo, true);
      function getInfo(){
        var xhr, formdata;
        if (window.XMLHttpRequest) {
          xhr = new XMLHttpRequest();
        } else {
          /*CODE FOR OLDER BROWSERS*/
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhr.onreadystatechange = function() {
          /*IF EVERYTING IS OKAY THEN DISPLAY THE RESULT */
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
          }
        };
        

        formdata = new FormData();

        formdata.append('filename',document.getElementById('filename').value);
        formdata.append('file',file.files[0]);


        

        /* THIS IS A POST REQUEST IT WILL SEND AND GET INFORMATION TO/FROM SERVER */
        xhr.open("POST", "php/upload.php", true);

        /*IMPORTANT!!!!! WHEN USING THE FORMDATA OBJECT DO NOT INCLUDE THE setRequestHeader method.  LIKE WHAT WAS DONE WITH POST */
        //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        /*I USE THE DATA VARIABLE THAT I CREATED TO STORE THE ACTUAL DATA AND THEN SEND THE DATA USING THE DATA NAME I USE WITH THE SEND REQUEST.  A SEND REQUEST MUST HAVE A NAME THAT ATTACHES TO WHAT IS BEING SENT.*/
        xhr.send(formdata);
      }