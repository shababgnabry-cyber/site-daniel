/* Scripts da página carrinho.html */

			function alterarQuantidade(botao, valor) {
            const produto = botao.parentElement;
            const quantidadeEl = produto.querySelector(".quantidade");
            const precoEl = produto.querySelector(".preco");
            const totalEl = produto.querySelector(".total");

            let quantidade = parseInt(quantidadeEl.textContent);

            
            quantidade += valor;
            if (quantidade < 1) quantidade = 1;

            quantidadeEl.textContent = quantidade;

      
            const preco = parseFloat(precoEl.textContent);
            const total = quantidade * preco;
            totalEl.textContent = total.toFixed(2);

          
            atualizarTotalGeral();
        }

        function atualizarTotalGeral() {
            let soma = 0;

         
            const totais = document.querySelectorAll(".total");

            totais.forEach(item => {
                soma += parseFloat(item.textContent);
            });

            
            document.getElementById("totalGeral").textContent = 
                "Total Geral: R$ " + soma.toFixed(2);
        }
        atualizarTotalGeral();
