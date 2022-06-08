
function progressBar(id, labelID, title, percent, total , color1 = "#f7f1f0", color2 = "#262220") {

	document.getElementById(labelID).innerHTML = title + " (" + percent + "%)"; 

	document.getElementById(id).innerHTML = 
			"<div style='width:80%; height: 50px; background-color: " 
		+ 	color1 + "; margin: auto; border-radius: 3.5px;'>" 
		+ 	"<div style='width:" 
		+ 	Math.min(percent, 100) + "%; background-color: " 
		+ 	color2 + "; height: 100%; border-radius: "
		+	(percent == 100? "3.5" : "3.5px 0 0 3.5")
		+ 	"px'></div>"
		+	"<p style='display: inline; float: left;'>"
		+	"0 kr</p>"
		+	"<p style='display: inline; float: right;'>"
		+	total + " kr"
		+	"</p></div>";
}