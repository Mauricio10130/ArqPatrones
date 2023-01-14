/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pattern_bridge2;

/**
 *
 * @author JOSE MERIDA ROCA
 */
public class Terrestre implements IEnvio{

    @Override
    public String procesarEnvio() {
      return "";
    }

    @Override
    public String enviar() {
      return "";


    }

    @Override
    public String procesarEntrega() {
                   return "";


    }

    @Override
    public float precio() {
        
        return (float)2.1;
    }
    
}
