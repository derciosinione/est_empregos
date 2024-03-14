const container = document.getElementById('container');
const registerB = document.getElementById('register');
const loginB = document.getElementById('login');


registerB.addEventListener('click', ()=>{
    container.classList.add("active");
});

loginB.addEventListener('click', () => {
    container.classList.remove("active");
});

//==============================|TEXTO GENERATIVO!!|=========================================

const testimonialsContainer = document.querySelector('.testimonials-container');
const testimonial = document.querySelector('.testimonial');

const testimonials = [
  {
    text:
      "  Hoje, criamo soluções inovadoras para os desafios que os consumidores enfrentam no dia a dia e nos eventos",
  },
  {
    text:
      'No presente momento, estamos desenvolvendo soluções criativas para resolver os problemas que os consumidores enfrentam diariamente e em ocasiões específicas.',
  },
  {
    text:
      "Atualmente, estamos focados em criar respostas inovadoras para os desafios enfrentados pelos consumidores em suas rotinas e eventos especiais.",
  },
  {
    text:
      "Hoje, estamos dedicados a conceber soluções inventivas para os obstáculos que os consumidores encontram em suas vidas diárias e durante eventos especiais.",
  },
  {
    text:
      "Neste dia, estamos empenhados em desenvolver soluções inovadoras para os desafios que os consumidores enfrentam tanto no cotidiano quanto em momentos especiais.",
  },
  {
    text:
      'No momento presente, estamos trabalhando para criar soluções inovadoras que abordem os desafios dos consumidores em suas atividades diárias e eventos especiais.',
  },
  {
    text:
      'Hoje em dia, estamos comprometidos em desenvolver soluções inovadoras para resolver os desafios que os consumidores enfrentam tanto no dia a dia quanto em eventos especiais.',
  },
]

let idx = 1

function updateTestimonial() {
  const { name, position, photo, text } = testimonials[idx]

  testimonial.innerHTML = text
  userImage.src = photo
  username.innerHTML = name
  role.innerHTML = position

  idx++

  if (idx > testimonials.length - 1) {
    idx = 0
  }
}

setInterval(updateTestimonial, 10000)