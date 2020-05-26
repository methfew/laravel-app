function percentage(num, per)
{
  per=10;
  return (num/100)*per;
}


function getOutput(){
	return document.getElementById("output-value").innerText;
}
function printOutput(num){
		document.getElementById("output-value").innerText=num;
}

document.getElementById("calculate").addEventListener('click',function(){
		var credit = document.getElementById("creditInput").value;
		var annual = document.getElementById("annualInput").value;
		var percent_val = percentage(credit, 10);
		var calc_result = percent_val + parseInt(credit);
		document.getElementById("output-value").innerText=calc_result / parseInt(annual);		
	});

	document.getElementById("calculate2").addEventListener('click',function(){
		var credit = document.getElementById("creditInput2").value;
		var annual = document.getElementById("annualInput2").value;
		var percent_val = percentage(credit, 10);
		var calc_result = percent_val + parseInt(credit);
		document.getElementById("output-value2").innerText=calc_result / parseInt(annual);		
	});