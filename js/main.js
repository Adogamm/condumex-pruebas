var graficalineascontexto=document.getElementById("grafica-lineas");
var graficalineas=new Chart(graficalineascontexto,{
    type:"line",
    data:{
      labels:["1ro","2do","3ro","4to"],
      datasets:[{
      label: "Velocidad de la maquína",
      data:[7,8,10,9],
      backgroundColor:[
        'rgb(66, 134, 244, 0.5)',
        'rgb(74, 135, 72, 0.5)',
        'rgb(229, 80, 72, 0.5)',
        'rgb(10, 180, 172, 0.5)',
      ]
    },
    {
      label: "Máximo",
      options: {
        elements: {
          point: {
            radius: 0
          }
        }
      },
      data:[9.5,9.5,9.5,9.5],
      pointRadius: 0,
      borderColor: ['rgb(245, 10, 10, 0.3)',],
      backgroundColor:[
        'rgb(245, 10, 10, 0.3)',
      ]
    },{
      label: "Óptimo",
      options: {
        elements: {
          point: {
            radius: 0
          }
        }
      },
      data:[8.5,8.5,8.5,8.5],
      pointRadius: 0,
      borderColor: ['rgb(10, 245, 10, 0.3)',],
      backgroundColor:[
        'rgb(10, 245, 10, 0.3)',
      ]
    },
    {
      label: "Mínimo",
      options: {
        elements: {
          point: {
            radius: 0
          }
        }
      },
      data:[7.5,7.5,7.5,7.5],
      pointRadius: 0,
      borderColor: ['rgb(255, 245, 10, 0.4)',],
      backgroundColor:[
        'rgb(255, 245, 10, 0.4)',
      ]
    }
  ]
  }
});