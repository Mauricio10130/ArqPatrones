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
public class EnvioAire implements IEnvio{

    @Override
    public String procesarEnvio() {
            System.out.println("El paquete se ha cargado en el avion. . . ");
            return "El paquete se ha cargado en el avion. . . ";
    }

    @Override
    public String enviar() {
        System.out.println("El paquete esta siendo enviado por avion. . . ");
        return "El paquete esta siendo enviado por avion. . . ";
    }

    @Override
    public String procesarEntrega() {
           System.out.println("El paquete se ha descargado en el aeropuerto.");
           return "El paquete se ha descargado en el aeropuerto.";
    }
    
    @Override
    public float precio() {
           return (float) 1.1;
    }
    
}
