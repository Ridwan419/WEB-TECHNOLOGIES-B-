<?php

require_once ('../Model/model.php');

function fetchAllDealers(){
	return showAllDealer();

}
function fetchDealer($username){
	return showDealer($username);

}
?>
