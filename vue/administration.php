<!DOCTYPE HTML> <!--TODO : avoir des boutons liant sur une page d'ajout, une page de modif et une page de suppression d'article-->
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="vue/stylesheet/bootstrap.css"/>
    <title>Blog</title>
</head>
<body class="pagebackground">
<header>
    <table class="page-header text-center">
        <tr>
            <td>
                <img src="vue/stylesheet/worlds-2015-banner-875.jpg" />
            </td>
        </tr>

            <li><a href="index.php">Retour accueil</a></li>
        <table/>
        <header/>
        
        <?php
            if($_SESSION['role']!='admin') {
                $TMessage[] = "We do not know who you are. Or what you want. But the fact is, you should not be here.";
                require 'erreur.php';
            }
            else{?>
                <h1>Formulaire d'ajout d'article</h1>
                <div class="formconnection">
                    <form id="ajArticle" >
                        <input type="text" name="id" value="id" id="id">
                        <input type="text" name="titre" value="titre" id="titre">
                        <br>
                        <textarea name="resume" value="resume" id="resume"></textarea>
                        <br>
                        <input type="hidden" name="action" value="ajouter" id="action">
                        <input type="submit" value="Ajouter">
                    </form>
                </div>
                <span id="spanResultat"></span>
                <script>
                    function afficheDonnes(){
                        var id=$("#id").val();
                        var titre=$("#titre").val();
                        var resume=$("#resume").val();
                        
                        if(!id || !titre || !resume|| id="id" || titre=="titre" || resume=="resume"){
                            alert("Erreur saisie de formulaire");
                        }else{
                            $("#spanResultat").html("<em>Id: </em>"+id+"<em>Titre: </em>"+titre+"<em>Resume: </em>"+resume)
                        }
                    }
                    
                    $("#ajArticle").submit(afficheDonnes);
                </script>
                <div class="formconnection">
                    <form  method="post">
                        <input type="submit" value="Deconnexion">
                        <input type="hidden" value="deconnecter">
                    </form>
                </div>
            <?php }?>

        <footer class="modal-footer">Ce blog est un projet PHP</footer>
</body>
</html>