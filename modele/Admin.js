/**
 * Created by maxime on 02/02/2016.
 */

function fabriqueAdmin(login, mdp)
{
    var dataError=();
    var newAdmin=new Object();

    if(/^[a-zA-Z0-9]{1,8}$/.test(login)){
        newAdmin.login=login;
    }else{
        dataError.login="Erreur dans le login.";
    }
    if(/^[a-zA-Z0-9&#-_+=]{1,10}$/.test(mdp))
    {
        newAdmin.mdp=mdp;
    }else{
        dataError.mdp="Erreur dans le mot de passe.";
    }

}