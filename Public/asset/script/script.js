const url = 'http://localhost/testingv2/api/addTest';
let date = new Date();
date = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
const json = JSON.stringify({name:'test1', valid:true, date:date});
const test = fetch(url,
            {   
                method :'POST',
                headers :{
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body:json
            }).then(async response => {
                const data = await response.json();
                console.log(response);
                //tests si le code http est 500
                if(response.status === 500){
                    console.log('Bad request');
                }
                //test si le code http est 200
                else if(response.status === 200){
                    console.log('Add Tests success');
                }
                //tests si le code http est 405
                else if(response.status === 405){
                    console.log(data.Erreur);
                }
                else{
                    console.log(data);
                }
            });