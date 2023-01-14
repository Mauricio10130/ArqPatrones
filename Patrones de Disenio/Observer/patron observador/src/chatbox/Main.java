package chatbox;

import javax.swing.*;

public class Main {
    public static void main(String[] args) {
        SujetoChatBox sujetoChatBox = new SujetoChatBox();

        ObservadorFrame observer1 = new ObservadorFrame(sujetoChatBox, "Arnol");
        ObservadorFrame observer2 = new ObservadorFrame(sujetoChatBox, "Luis");
        ObservadorFrame observer3 = new ObservadorFrame(sujetoChatBox, "Juan");

        observer1.setLocation(50, 200);
        observer2.setLocation(500, 200);
        observer3.setLocation(950, 200);

        observer1.setDefaultCloseOperation(WindowConstants.DISPOSE_ON_CLOSE);
        observer2.setDefaultCloseOperation(WindowConstants.DISPOSE_ON_CLOSE);
        observer3.setDefaultCloseOperation(WindowConstants.DISPOSE_ON_CLOSE);

        sujetoChatBox.agregar(observer1);
        sujetoChatBox.agregar(observer2);
        sujetoChatBox.agregar(observer3);

        observer1.setVisible(true);
        observer2.setVisible(true);
        observer3.setVisible(true);
    }
}
