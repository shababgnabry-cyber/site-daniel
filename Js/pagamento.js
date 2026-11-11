/* Scripts da página pagamento.html */

        function mostrarCampos() {
            const metodo = document.querySelector('input[name="metodo"]:checked').value;

            document.querySelector(".cartao").style.display = "none";
            document.querySelector(".pix").style.display = "none";
            document.querySelector(".boleto").style.display = "none";

            document.querySelector("." + metodo).style.display = "block";
        }
