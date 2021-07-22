class Person {
  constructor(name) {
    this.name = name
    this.greet()
  }

  greet() {
    console.log(`Hello, my name is ${this.name}.`)
  }
}

export default Person