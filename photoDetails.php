<?php

include_once "DAL/photos.php";
include_once "DAL/users.php";
include_once "accessCheck.php";
include_once "utilities/htmlHelper.php";
include_once "utilities/dateFormat.php";


if (isset($_GET["id"])){
    $id = $_GET["id"];
   
    $editPhotoCmd = "";
    $deletePhotoCmd = "";
    $addPhotoCmd = html_flashButtonLink('iconPlus','addPhoto.php', 'Ajouter une photo','right');
    $backCmd = html_flashButtonLink('iconLeft','listPhotos.php', 'Retour...','right');
    $photo = TablePhotos()->get($id);
    $title = $photo["Title"];
    if ($photo["UserId"] == $_SESSION["loggedUser"]["Id"] || $_SESSION["loggedUser"]["Admin"] == 1) {
        $editPhotoCmd = html_flashButtonLink('iconEdit','editPhoto.php?id='.$id, 'Modifer...','right');
        $deletePhotoCmd = html_flashButton("deletePhotoCmd iconDelete", "deletePhoto_$id", "Effacer la photo $title", 'bottom');
    }
 
    $url = TablePhotos()->getPhotoUrl($photo["GUID"]);
    $fixedSizePhoto = html_fittedImage(TablePhotos()->getPhotoURL($photo["GUID"]), "fixeSizePhoto");
    $description = $photo["Description"];
    $shared = ($photo["Shared"] != 0 ? "oui" : "non");

    $viewTitle = $photo["Title"]."<br>".$addPhotoCmd."&nbsp".$editPhotoCmd."&nbsp".$deletePhotoCmd."&nbsp".$backCmd;
    
    $owner = TableUsers()->get($photo["UserId"]);
    $ownerName = $owner["Name"];
    $avatarImage = html_fittedImage(TableUsers()->getAvatarURL($owner["AvatarGUID"]), "smallAvatar");
    $keyword = ($photo["Keywords"] != ""? $photo["Keywords"] : " auncun");
    $creationDate = toFrenchDate($photo["CreationDate"]);
    $viewContent = <<<HTML
    <div class="detailsContainer">
        <div>$fixedSizePhoto</div>
        
        <div style="margin-left:10px;">
            <h4>Description:</h4>
            <h5>$description</h5>
            <hr>
            <h4>Mots-clés:</h4>
            <h5>$keyword</h5>
            <hr>
            <h4>Créateur:</h4>
            <h5>$avatarImage $ownerName</h5>
            <br>
            <hr>
            <h4>Date de création:</h4>
            <h5>$creationDate</h5>
            <hr>
            <h4>Partagée:</h4>
            <h5>$shared</h5>
        </div>
    <div>
    HTML;
    $viewScript = "js/photoDetails.js";
    include "view/master.php";
} else {
    illegalAccessRedirection();
}


?>