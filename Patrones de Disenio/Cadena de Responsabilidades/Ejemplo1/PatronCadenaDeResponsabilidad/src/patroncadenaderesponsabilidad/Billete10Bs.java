/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package patroncadenaderesponsabilidad;

/**
 *
 * @author omair
 */
public class Billete10Bs extends Gestor{
    @Override
    protected int SolicitaNext() {
      int resto = cantidad %10;
      int restoCambio = cantidad / 10;
      if(restoCambio >0){
          this.mensajeCantidad =  restoCambio + " X 10 BS \n";
      }
      return  resto;
    }
}
