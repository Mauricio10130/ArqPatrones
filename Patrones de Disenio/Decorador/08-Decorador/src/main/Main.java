package main;

public class Main {

    public static void main(String[] args) {
        IBebida bebida = new CafeExpreso();
        Crema bebidaWithCrema = new Crema(bebida);
        System.out.println(bebidaWithCrema.getCosto());
        System.out.println(bebidaWithCrema.getDetalle());
    }

}
