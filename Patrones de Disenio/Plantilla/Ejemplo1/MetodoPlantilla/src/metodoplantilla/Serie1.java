package metodoplantilla;

public class Serie1 extends Serie{

    @Override
    public void siguiente() {
        serie = serie +1;
        va = serie * serie;
    }
    
}
