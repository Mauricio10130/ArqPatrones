package chatbox;

import java.util.ArrayList;
import java.util.List;

public class SujetoChatBox implements ISujeto {
    private ArrayList<ObservadorFrame> observadores;

    public SujetoChatBox() {
        observadores = new ArrayList<>();
    }

    @Override
    public void agregar(IObservador o) {
        observadores.add((ObservadorFrame) o);
    }

    @Override
    public void eliminar(IObservador o) {
        observadores.remove((ObservadorFrame) o);
    }

    @Override
    public void notificar() {
        for (IObservador observador : observadores) {
            observador.actualizar();
        }
    }

    public void enviarMensaje(String mensaje) {
        for (ObservadorFrame observador : observadores) {
            observador.mensaje(mensaje);
        }
        notificar();
    }


    public void escribiendo(boolean escribiendo) {
        for (ObservadorFrame observador : observadores) {
            observador.escribiendo(escribiendo);
        }
        notificar();
    }

    public List<ObservadorFrame> getObservadores() {
        return observadores;
    }
}
