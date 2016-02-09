/**
 * Created by maxime on 01/26/2016.
 */
function fabriqueArticle(id,titre,resume) {
    var dataError={};
    var newArticle=new Object();
    
    if(/^[0-9]*/.test(id)){
        newArticle.id=id;
    }else{
        dataError.id="erreur forme de l'id incorrecte";
    }
    
    if(/^[a-zA-Z0-9]*/.test(titre)){
        newArticle.titre=titre;
    }else{
        dataError.titre="erreur forme de titre incorrecte";
    }
    
    if(/^[a-zA-Z0-9]*/.test(resume)){
        newArticle.resume=resume;
    }else{
        dataError.corps="erreur forme du resume incorrecte";
    }
    
    return {error:dataError,article:newArticle};
}

