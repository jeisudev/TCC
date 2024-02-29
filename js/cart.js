const cartToggleBtn = document.querySelector('.cart-hide-btn')
const cartDivContainer = document.querySelector('.cart')
const cartDivContent = document.querySelector('.cart-content')

const cartTotalPrice = document.querySelector('#total-price')
const cartOldPrice = document.querySelector('#total-price-striked')
const cartDiscountPrice = document.querySelector('#discount-price')

const hideTimeout = 500 // Tempo pra sumir, deve ser o mesmo do 'slide-out'

let isCartHidden = true

cartToggleBtn.addEventListener('click', () => {
  if (isCartHidden) {
    // Se o carrinho estiver escondido, ele irá aparecer
    cartDivContainer.classList.remove('slide-out')
    cartDivContainer.classList.add('slide-in')
  } else {
    // Se o carrinho estiver visível, isso define um temporizador para adicionar a classe 'hide'
    cartDivContainer.classList.remove('slide-in')
    cartDivContainer.classList.add('slide-out')

    setTimeout(() => {
      cartDivContainer.classList.add('hide')
    }, hideTimeout)
  }

  // Inverte o estado
  isCartHidden = !isCartHidden
})

// Função para mostrar o carrinho (você pode chamá-la usando outro botão, como o de carrinho por ex)
function showCart() {
  cartDivContainer.classList.remove('slide-out', 'hide')
  cartDivContainer.classList.add('slide-in')
  isCartHidden = false // Atualize o estado para mostrar o carrinho
}

function placeCartData(item) {
  const spaceToPlace = document.querySelector('#cart-data-placeholder')

  const cartItemDiv = document.createElement('div')
  cartItemDiv.classList.add('cart-box-item-d')

  cartItemDiv.innerHTML = `
  <img
    src="${item.img}"
    alt="Cart Item"
    width="75px"
  />
  <div class="cart-box-content">
    <div class="cart-item-title">
      <span class="cart-item-name"
        >${item.name}</span
      >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="cart-svg-icon"
        viewBox="0 0 512 512"
        width="16px"
        height="16px"
        onclick="removeItemFromCart(this)"
      >
        <path
          d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320"
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="32"
        />
        <path
          stroke="currentColor"
          stroke-linecap="round"
          stroke-miterlimit="10"
          stroke-width="32"
          d="M80 112h352"
        />
        <path
          d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224"
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="32"
        />
      </svg>
    </div>
    <span class="cart-item-type">${item.type[0]}: ${item.type[1]}</span>
    <div class="cart-item-quantity-flex">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="cart-svg-icon"
        viewBox="0 0 512 512"
        width="25px"
        height="25px"
        onclick="decreaseCartItem(this, ${item.value})"
      >
        <path
          d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z"
          fill="none"
          stroke="currentColor"
          stroke-miterlimit="10"
          stroke-width="32"
        />
        <path
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="32"
          d="M336 256H176"
        />
      </svg>
      <input
        type="text"
        name="item-quantity"
        class="cart-item-quantity"
        value="1"
        onblur="updatePriceDirect(this, ${item.value})"
      />
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="cart-svg-icon"
        onclick="increaseCartItem(this, ${item.value})"
        viewBox="0 0 512 512"
        width="25px"
        height="25px"
      >
        <path
          d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z"
          fill="none"
          stroke="currentColor"
          stroke-miterlimit="10"
          stroke-width="32"
        />
        <path
          fill="none"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="32"
          d="M256 176v160M336 256H176"
        />
      </svg>
      <span class="right">R$${item.value.toFixed(2)}</span>
    </div>
  </div>
  `

  spaceToPlace.appendChild(cartItemDiv)
}

async function getCartData() {
  try {
    const response = await fetch('data/cart.json')
    if (!response.ok) {
      throw new Error('Erro ao carregar os dados do carrinho.')
    }
    const data = await response.json()
    return data
  } catch (error) {
    console.error(error)
    return null
  }
}

getCartData().then((cartData) => {
  if (cartData) {
    cartData.forEach((item) => {
      placeCartData(item)
    })
  } else {
    // Caso de erro ou dados vazios
    console.error('Não foi possível carregar os dados do carrinho.')
  }
})

function increaseCartItem(buttonElement, itemValue) {
  const inputElement = buttonElement.parentElement.querySelector(
    '.cart-item-quantity',
  )

  const quantity = parseInt(inputElement.value, 10)

  const newQuantity = quantity + 1

  inputElement.value = newQuantity

  const priceElement = buttonElement.parentElement.querySelector('.right')

  updateCartTotal()
  priceElement.textContent = `R$${(newQuantity * itemValue).toFixed(2)}`
}

function decreaseCartItem(buttonElement, itemValue) {
  const inputElement = buttonElement.parentElement.querySelector(
    '.cart-item-quantity',
  )

  const quantity = parseInt(inputElement.value, 10)

  if (quantity > 1) {
    const newQuantity = quantity - 1

    inputElement.value = newQuantity

    const priceElement = buttonElement.parentElement.querySelector('.right')

    priceElement.textContent = `R$${(newQuantity * itemValue).toFixed(2)}`
    updateCartTotal()
  }
}

function removeItemFromCart(element) {
  const parentCartItem = element.closest('.cart-box-item-d')
  if (parentCartItem) {
    parentCartItem.remove()
    updateCartTotal()
    console.log('Item removed from cart')
  }
}

function updateCartTotal() {
  // Seleciona todos os elementos de preço
  const priceElements = document.querySelectorAll('.right')

  let total = 0

  priceElements.forEach((priceElement) => {
    const price = parseFloat(priceElement.textContent.replace('R$', ''))

    total += price
  })

  const discount = total * 0.1 // 10% de desconto

  // Subtraia o desconto do total
  const totalComDesconto = total - discount

  // Atualize os preços no carrinho
  cartTotalPrice.textContent = `R$${total.toFixed(2)}`
  cartOldPrice.textContent = `R$${total.toFixed(2)}`
  cartDiscountPrice.textContent = `R$${totalComDesconto.toFixed(2)}`
}

function updatePriceDirect(inputElement, originalValue) {
  const newQuantity = parseInt(inputElement.value, 10)

  if (!isNaN(newQuantity)) {
    const newTotalPrice = newQuantity * originalValue

    const priceElement = inputElement
      .closest('.cart-box-item-d')
      .querySelector('.right')

    priceElement.textContent = `R$${newTotalPrice.toFixed(2)}`
    updateCartTotal()
  }
}

function addCartItemTest(quantity = 1) {
  const itemTest = {
    name: 'BCAAaaaa (10:1:1) (200G) (EM PÓ) - GROWTH SUPPLEMENTS',
    img: 'img/cart/bcaa-10-1-1-growth-supplements.png',
    type: ['Sabor', 'Limão'],
    value: 56.0,
  }

  for (let i = 0; i < quantity; i++) {
    placeCartData(itemTest)
  }

  updateCartTotal()
  console.log(quantity + ' Cart item added')
}
