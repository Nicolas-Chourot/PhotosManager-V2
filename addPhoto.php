<?php
    include_once "DAL/photos.php";
    include_once "accessCheck.php";
    include_once "utilities/form.php";
    $viewTitle = "Inscription";

    if (isset($_POST["Submit"])) {
        $_POST["Shared"] = (isset($_POST["Shared"]) ? 1 : 0);
        if (TablePhotos()->add($_POST)) {
            header('location:listPhotos.php'); exit();
        }
    }     
    $title = "";
    $description ="";
    $keywords = "";
    $sharedChekbox ="<input type='checkbox' id='Shared' name='Shared' />";
    $photoUploader = TablePhotos()->html_PhotoUploader();
    $viewContent = <<<HTML
    <div class="smallFormContainer">
    <br>
        <form id="addPhotoForm" method="post" class="form-group" enctype="multipart/form-data">
            <label  for="Title">Titre</label>
            <input  type="text"     
                    id="Title"      
                    name="Title" 
                    class="form-control" 
                    placeholder="Titre de la photo..."
                    value="$title">
            <label for="Description">Description</label>
            <textarea   type="text"     
                        id="Description"     
                        name="Description"
                        class="form-control" 
                        rows="4" cols="50"
                        placeholder="Description de la photo...">$description</textarea>
            <br>
            <label for="Keywords">Mots-clés</label>
                <input  type="text"     
                        id="Keywords"      
                        name="Keywords" 
                        class="form-control" 
                        placeholder="Mots-clés séparés par des espaces..."
                        value="$keywords">
                <br>
                <label for="Shared">Partagée</label>
                $sharedChekbox
                <br>
            <div>
                $photoUploader
            </div>
            <br>
            <input  type="submit"   
                    name="Submit"    
                    class="btn btn-light btn-exit" 
                    value="Enregistrer...">
            <input  type="button"   
                    class="btn btn-secondary btn-exit"  
                    value="Annuler..."
                    onclick = "window.location ='listPhotos.php'">
        </form>
    </div>
    HTML;
    $viewScript = "js/addPhotoFormValidation.js";
    include "view/master.php";
?>