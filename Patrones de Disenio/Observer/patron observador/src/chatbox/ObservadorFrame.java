package chatbox;

public class ObservadorFrame extends javax.swing.JFrame implements IObservador {

    void mensaje(String mensaje) {
        addText(mensaje);
    }

    void escribiendo(boolean visible) {
        setVisibleLabelEscribiendo(visible);
    }

    public void actualizar() {
        repaint();
    }

    private SujetoChatBox sujetoChatBox;
    private String usuario;

    public ObservadorFrame(SujetoChatBox sujetoChatBox, String usuario) {
        initComponents();
        this.setTitle(usuario);
        this.usuario = usuario;
        this.sujetoChatBox = sujetoChatBox;
        botonUnirse.setVisible(sujetoChatBox.getObservadores().contains(this));

        botonSalirse.setVisible(!sujetoChatBox.getObservadores().contains(this));
    }

    private void initComponents() {

        botonEnviar = new javax.swing.JButton();
        botonUnirse = new javax.swing.JButton();
        botonSalirse = new javax.swing.JButton();
        jTextField1 = new javax.swing.JTextField();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTextArea1 = new javax.swing.JTextArea();
        labelEscribiendo = new javax.swing.JLabel();
        labelEscribiendo.setVisible(false);

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBackground(new java.awt.Color(51, 255, 255));
        setResizable(false);

        botonEnviar.setText("Enviar");
        botonEnviar.addActionListener(this::botonEnviarActionPerformed);

        botonUnirse.setText("Unirse");
        botonUnirse.addActionListener(this::botonUnirseActionPerformed);

        botonSalirse.setText("Salirse");
        botonSalirse.addActionListener(this::botonSalirseActionPerformed);

        jTextField1.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyTyped(java.awt.event.KeyEvent evt) {
                jTextField1KeyTyped(evt);
            }
        });

        jTextArea1.setEditable(false);
        jTextArea1.setColumns(15);
        jTextArea1.setLineWrap(true);
        jTextArea1.setRows(5);
        jScrollPane1.setViewportView(jTextArea1);

        labelEscribiendo.setText("Alguien está escribiendo...");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
                layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(layout.createSequentialGroup()
                                .addContainerGap()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                        .addComponent(jScrollPane1)
                                        .addGroup(layout.createSequentialGroup()
                                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                                        .addComponent(labelEscribiendo)
                                                        .addGroup(layout.createSequentialGroup()
                                                                .addComponent(jTextField1, javax.swing.GroupLayout.PREFERRED_SIZE, 320, javax.swing.GroupLayout.PREFERRED_SIZE)
                                                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                                                .addComponent(botonEnviar)
                                                        ).addGroup(
                                                                layout.createSequentialGroup()
                                                                        .addComponent(botonUnirse)
                                                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                                                        .addComponent(botonSalirse)
                                                        )
                                                )
                                                .addGap(0, 4, Short.MAX_VALUE)))
                                .addContainerGap())
        );
        layout.setVerticalGroup(
                layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                        .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                                .addContainerGap()
                                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 204, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(labelEscribiendo)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(jTextField1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(botonEnviar)
                                )
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                        .addComponent(botonUnirse, javax.swing.GroupLayout.PREFERRED_SIZE, 23, javax.swing.GroupLayout.PREFERRED_SIZE)
                                        .addComponent(botonSalirse, javax.swing.GroupLayout.PREFERRED_SIZE, 23, javax.swing.GroupLayout.PREFERRED_SIZE)
                                )
                                .addContainerGap(39, Short.MAX_VALUE))
        );

        pack();
    }

    private void botonEnviarActionPerformed(java.awt.event.ActionEvent evt) {
        String mensaje = this.usuario + ": " + this.jTextField1.getText();
        sujetoChatBox.enviarMensaje(mensaje);
        jTextField1.setText("");
        checkText();
    }

    private void botonUnirseActionPerformed(java.awt.event.ActionEvent evt) {
        sujetoChatBox.agregar(this);
        sujetoChatBox.enviarMensaje(this.usuario + " se ha unido al chat");
        botonUnirse.setVisible(false);
        botonSalirse.setVisible(true);
    }

    private void botonSalirseActionPerformed(java.awt.event.ActionEvent evt) {
        sujetoChatBox.enviarMensaje(this.usuario + " se ha salido del chat");
        sujetoChatBox.eliminar(this);
        botonSalirse.setVisible(false);
        botonUnirse.setVisible(true);
    }

    private void jTextField1KeyTyped(java.awt.event.KeyEvent evt) {
        checkText();
    }

    public void checkText() {
        boolean stat = labelEscribiendo.isVisible();
        if (jTextField1.getText().equals("")) {
            sujetoChatBox.escribiendo(false);
            setVisibleLabelEscribiendo(stat);
        } else {
            sujetoChatBox.escribiendo(true);
            setVisibleLabelEscribiendo(stat);
        }
    }

    /**
     * @param args the command line arguments
     *             <p>
     *             public static void main(String args[]) {
     *             /* Set the Nimbus look and feel
     */
    //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html

        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Frame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Frame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Frame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Frame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
 //               new Frame().setVisible(true);
            }
        });
    }*/
    public void addText(String s) {
        System.out.println(s);
        jTextArea1.append(s + "\n");
    }

    public void setVisibleLabelEscribiendo(boolean visible) {
        labelEscribiendo.setVisible(visible);
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton botonEnviar;
    private javax.swing.JLabel labelEscribiendo;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea jTextArea1;
    private javax.swing.JTextField jTextField1;
    private javax.swing.JButton botonUnirse;
    private javax.swing.JButton botonSalirse;
}
