package chatbox;

public interface ISujeto {
    void agregar(IObservador o);
    void eliminar(IObservador o);
    void notificar();
}
