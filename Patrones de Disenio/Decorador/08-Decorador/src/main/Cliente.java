package main;

public class Cliente extends javax.swing.JFrame {

    public IBebida bebida;

    public Cliente() {
        initComponents();
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        background = new javax.swing.JPanel();
        jPanelContentCompBase = new javax.swing.JPanel();
        jLabelCafeExpreso = new javax.swing.JLabel();
        jLabelCafeDescafeinado = new javax.swing.JLabel();
        jPanelContentDecoradores = new javax.swing.JPanel();
        jLabelLeche = new javax.swing.JLabel();
        jLabelCrema = new javax.swing.JLabel();
        jLabelChocolate = new javax.swing.JLabel();
        jButtonRealizarVenta = new javax.swing.JButton();
        jPanelContentDetalle = new javax.swing.JPanel();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTextAreaDetalle = new javax.swing.JTextArea();
        jLabelInfo = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setBackground(new java.awt.Color(245, 245, 245));
        setResizable(false);

        background.setBackground(new java.awt.Color(245, 245, 245));

        jPanelContentCompBase.setBackground(new java.awt.Color(245, 245, 245));
        jPanelContentCompBase.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.LineBorder(new java.awt.Color(204, 204, 204), 1, true), "ComponenteBase"));

        jLabelCafeExpreso.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icon/cafeExpreso.png"))); // NOI18N
        jLabelCafeExpreso.setText("CafeExpreso");
        jLabelCafeExpreso.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabelCafeExpreso.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabelCafeExpresoMouseClicked(evt);
            }
        });

        jLabelCafeDescafeinado.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icon/cafeDescafeinado.png"))); // NOI18N
        jLabelCafeDescafeinado.setText("CafeDescafeinado");
        jLabelCafeDescafeinado.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabelCafeDescafeinado.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabelCafeDescafeinadoMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout jPanelContentCompBaseLayout = new javax.swing.GroupLayout(jPanelContentCompBase);
        jPanelContentCompBase.setLayout(jPanelContentCompBaseLayout);
        jPanelContentCompBaseLayout.setHorizontalGroup(
            jPanelContentCompBaseLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanelContentCompBaseLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jPanelContentCompBaseLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabelCafeExpreso, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jLabelCafeDescafeinado, javax.swing.GroupLayout.DEFAULT_SIZE, 242, Short.MAX_VALUE)))
        );
        jPanelContentCompBaseLayout.setVerticalGroup(
            jPanelContentCompBaseLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanelContentCompBaseLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabelCafeExpreso)
                .addGap(18, 18, 18)
                .addComponent(jLabelCafeDescafeinado)
                .addContainerGap(16, Short.MAX_VALUE))
        );

        jPanelContentDecoradores.setBackground(new java.awt.Color(245, 245, 245));
        jPanelContentDecoradores.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.LineBorder(new java.awt.Color(204, 204, 204), 1, true), "Decoradores"));

        jLabelLeche.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icon/leche.png"))); // NOI18N
        jLabelLeche.setText("Leche");
        jLabelLeche.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabelLeche.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jLabelLeche.setVerticalTextPosition(javax.swing.SwingConstants.TOP);
        jLabelLeche.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabelLecheMouseClicked(evt);
            }
        });

        jLabelCrema.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icon/crema.png"))); // NOI18N
        jLabelCrema.setText("Crema");
        jLabelCrema.setVerticalAlignment(javax.swing.SwingConstants.TOP);
        jLabelCrema.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabelCrema.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jLabelCrema.setVerticalTextPosition(javax.swing.SwingConstants.TOP);
        jLabelCrema.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabelCremaMouseClicked(evt);
            }
        });

        jLabelChocolate.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icon/chocolate.png"))); // NOI18N
        jLabelChocolate.setText("Chocolate");
        jLabelChocolate.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabelChocolate.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jLabelChocolate.setVerticalTextPosition(javax.swing.SwingConstants.TOP);
        jLabelChocolate.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabelChocolateMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout jPanelContentDecoradoresLayout = new javax.swing.GroupLayout(jPanelContentDecoradores);
        jPanelContentDecoradores.setLayout(jPanelContentDecoradoresLayout);
        jPanelContentDecoradoresLayout.setHorizontalGroup(
            jPanelContentDecoradoresLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanelContentDecoradoresLayout.createSequentialGroup()
                .addGap(24, 24, 24)
                .addComponent(jLabelCrema)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 81, Short.MAX_VALUE)
                .addComponent(jLabelChocolate, javax.swing.GroupLayout.PREFERRED_SIZE, 64, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(59, 59, 59)
                .addComponent(jLabelLeche, javax.swing.GroupLayout.PREFERRED_SIZE, 69, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(33, 33, 33))
        );
        jPanelContentDecoradoresLayout.setVerticalGroup(
            jPanelContentDecoradoresLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanelContentDecoradoresLayout.createSequentialGroup()
                .addGap(17, 17, 17)
                .addGroup(jPanelContentDecoradoresLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabelLeche)
                    .addComponent(jLabelChocolate)
                    .addComponent(jLabelCrema))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        jButtonRealizarVenta.setText("Realizar Venta");
        jButtonRealizarVenta.setBorder(new javax.swing.border.LineBorder(new java.awt.Color(204, 204, 204), 1, true));
        jButtonRealizarVenta.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jButtonRealizarVenta.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonRealizarVentaActionPerformed(evt);
            }
        });

        jPanelContentDetalle.setBackground(new java.awt.Color(245, 245, 245));
        jPanelContentDetalle.setBorder(javax.swing.BorderFactory.createTitledBorder(new javax.swing.border.LineBorder(new java.awt.Color(204, 204, 204), 1, true), "Detalle", javax.swing.border.TitledBorder.DEFAULT_JUSTIFICATION, javax.swing.border.TitledBorder.DEFAULT_POSITION, new java.awt.Font("JetBrains Mono", 0, 12))); // NOI18N

        jTextAreaDetalle.setColumns(20);
        jTextAreaDetalle.setRows(5);
        jScrollPane1.setViewportView(jTextAreaDetalle);

        javax.swing.GroupLayout jPanelContentDetalleLayout = new javax.swing.GroupLayout(jPanelContentDetalle);
        jPanelContentDetalle.setLayout(jPanelContentDetalleLayout);
        jPanelContentDetalleLayout.setHorizontalGroup(
            jPanelContentDetalleLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanelContentDetalleLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1)
                .addContainerGap())
        );
        jPanelContentDetalleLayout.setVerticalGroup(
            jPanelContentDetalleLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jPanelContentDetalleLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 105, Short.MAX_VALUE)
                .addContainerGap())
        );

        javax.swing.GroupLayout backgroundLayout = new javax.swing.GroupLayout(background);
        background.setLayout(backgroundLayout);
        backgroundLayout.setHorizontalGroup(
            backgroundLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(backgroundLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(backgroundLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(backgroundLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                        .addComponent(jPanelContentDetalle, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addGroup(backgroundLayout.createSequentialGroup()
                            .addComponent(jPanelContentCompBase, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGap(18, 18, 18)
                            .addComponent(jPanelContentDecoradores, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                    .addGroup(backgroundLayout.createSequentialGroup()
                        .addComponent(jButtonRealizarVenta, javax.swing.GroupLayout.PREFERRED_SIZE, 258, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(jLabelInfo, javax.swing.GroupLayout.PREFERRED_SIZE, 396, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        backgroundLayout.setVerticalGroup(
            backgroundLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(backgroundLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(backgroundLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(jPanelContentDecoradores, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jPanelContentCompBase, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(backgroundLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButtonRealizarVenta, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabelInfo))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 20, Short.MAX_VALUE)
                .addComponent(jPanelContentDetalle, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(background, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(background, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jLabelCafeExpresoMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabelCafeExpresoMouseClicked
        CafeExpreso cafeExpreso = new CafeExpreso();
        jLabelInfo.setText(Float.toString(cafeExpreso.getCosto()));
        bebida = cafeExpreso;
    }//GEN-LAST:event_jLabelCafeExpresoMouseClicked

    private void jLabelCafeDescafeinadoMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabelCafeDescafeinadoMouseClicked
        CafeDescafeinado cafeDescafeinado = new CafeDescafeinado();
        jLabelInfo.setText(Float.toString(cafeDescafeinado.getCosto()));
        bebida = cafeDescafeinado;
    }//GEN-LAST:event_jLabelCafeDescafeinadoMouseClicked

    private void jLabelCremaMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabelCremaMouseClicked
        Crema componenteConCrema = new Crema(bebida);
        jLabelInfo.setText(jLabelInfo.getText() + "+" + componenteConCrema.getPrecioCrema());
        bebida = componenteConCrema;
    }//GEN-LAST:event_jLabelCremaMouseClicked

    private void jLabelChocolateMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabelChocolateMouseClicked
        Chocolate componenteConChocolate = new Chocolate(bebida);
        jLabelInfo.setText(jLabelInfo.getText() + "+" + componenteConChocolate.getPrecioChocolate());
        bebida = componenteConChocolate;
    }//GEN-LAST:event_jLabelChocolateMouseClicked

    private void jLabelLecheMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabelLecheMouseClicked
        Leche componenteConLeche = new Leche(bebida);
        jLabelInfo.setText(jLabelInfo.getText() + "+" + componenteConLeche.getPrecioLeche());
        bebida = componenteConLeche;
    }//GEN-LAST:event_jLabelLecheMouseClicked

    private void jButtonRealizarVentaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonRealizarVentaActionPerformed
        jTextAreaDetalle.setText(bebida.getDetalle() + "\n---------------\nTotal: " + bebida.getCosto());
    }//GEN-LAST:event_jButtonRealizarVentaActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Cliente.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Cliente.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Cliente.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Cliente.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                Cliente cliente = new Cliente();
                cliente.setResizable(false);
                cliente.setLocationRelativeTo(null);
                cliente.setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JPanel background;
    private javax.swing.JButton jButtonRealizarVenta;
    private javax.swing.JLabel jLabelCafeDescafeinado;
    private javax.swing.JLabel jLabelCafeExpreso;
    private javax.swing.JLabel jLabelChocolate;
    private javax.swing.JLabel jLabelCrema;
    private javax.swing.JLabel jLabelInfo;
    private javax.swing.JLabel jLabelLeche;
    private javax.swing.JPanel jPanelContentCompBase;
    private javax.swing.JPanel jPanelContentDecoradores;
    private javax.swing.JPanel jPanelContentDetalle;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea jTextAreaDetalle;
    // End of variables declaration//GEN-END:variables
}
