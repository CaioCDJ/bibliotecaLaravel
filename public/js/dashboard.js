const canva = document.querySelector("#graphic");
const xyValues = [
  { x: 50, y: 7 },
  { x: 60, y: 8 },
  { x: 70, y: 8 },
  { x: 80, y: 9 },
  { x: 90, y: 9 },
  { x: 100, y: 9 },
  { x: 110, y: 10 },
  { x: 120, y: 11 },
  { x: 130, y: 14 },
  { x: 140, y: 14 },
  { x: 150, y: 15 }
];

const data = {
  labels: "boxer",
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};

new Chart("chart", {
  type: "line",
  data: data
});

const gemBooks = (linguagens,redes,arquitetura,banco,derivados,seguranca) => {
  const barColors = [
    "#068d9d",
    "#53599a",
    "#6d9dc5",
    "#80ded9",
    "#aeecef"
  ];

  new Chart("bookChart", {
    type: "polarArea",
    data: {
      labels: [
        "Linguagens",
        "Redes",
        "Arquitetura",
        "Banco de dados",
        "Derivados",
        "Segurança"
      ],
      datasets: [{
        backgroundColor: barColors,
        data: [
          linguagens,
          redes,
          arquitetura,
          banco,
          derivados,
          seguranca]
      }]
    },
    options: {
      title: {
        display: true,
        text: "Quantidade de livros por categoria"
      }
    }
  });
}
