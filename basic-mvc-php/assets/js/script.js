class  Producto{
  constructor(nombre,precio,categoria,descripcion){
    this._nombre=nombre;
    this._precio = precio;
    this._categoria = categoria;
    this._descripcion = descripcion;
  }
  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre=nombre;
  }
  get precio(){
    return this._precio;
  }
  set precio(precio){
    this._precio=precio;
  }
  get categoria(){
    return this._categoria;
  }
  set categoria(categoria){
    this._categoria=categoria;
  }
  get descripcion(){
    return this._descripcion;
  }
  set descripcion(descripcion){
    this._descripcion=descripcion;
  }
}
class Cliente {
  constructor(nombre,direccion,telefono) {
    this._nombre=nombre;
    this._direccion=direccion;
    this._telefono=telefono;
  }
  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre=nombre;
    return this._nombre;
  }
  get direccion(){
    return this._direccion;
  }
  set direccion(direccion){
    this._direccion=direccion;
    return this._direccion;
  }
  get telefono(){
    return this._telefono;
  }
  set telefono(telefono){
    this._telefono=telefono;
    return this._telefono;
  }

}
