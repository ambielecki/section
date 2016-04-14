/**
 * Created by Bielecki on 4/14/2016.
 */
window.addEventListener('load', selectRoster);

function selectRoster(){
    if(document.getElementById('roster_btn')){
        var btn = document.getElementById('roster_btn');
        btn.addEventListener('click',function(){
            var teamId = document.getElementById('team_select').value;
            window.location.href = "/roster/"+teamId;
        });
    }
}