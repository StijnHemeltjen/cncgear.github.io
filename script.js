// For CNC-Gear
const tablinksCnc = document.getElementsByClassName("tab-links-cnc");
const tabcontentsCnc = document.getElementsByClassName("tab-contents-cnc");

function openTabCnc(tabname, event) {
    for (let tablink of tablinksCnc) {
        tablink.classList.remove("active-link-cnc");
    }
    for (let tabcontent of tabcontentsCnc) {
        tabcontent.classList.remove("active-tab-cnc");
    }
    event.currentTarget.classList.add("active-link-cnc");
    document.getElementById(tabname).classList.add("active-tab-cnc");
}


// For Lantek
const tablinksLantek = document.getElementsByClassName("tab-links-lantek");
const tabcontentsLantek = document.getElementsByClassName("tab-contents-lantek");

function openTabLantek(tabname) {
    for (let tablink of tablinksLantek) {
        tablink.classList.remove("active-link-lantek");
    }
    for (let tabcontent of tabcontentsLantek) {
        tabcontent.classList.remove("active-tab-lantek");
    }
    event.currentTarget.classList.add("active-link-lantek");
    document.getElementById(tabname).classList.add("active-tab-lantek");
}


// Index.html script

$(document).ready(function() {
    $('#submit').click(function() {
        var formjson = $('form#myform').serializeArray();
        var formxml = json2xml({ form: formjson });
        $.post("/collect.cgi", { 'data': formxml }, function (data){ });
        alert(formxml); // You can remove this line, it's for debugging purposes
    });
});
  
