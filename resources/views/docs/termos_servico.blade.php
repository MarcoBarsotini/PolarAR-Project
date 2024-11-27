<style>
    h3, h2, span {
        color: white !important;
        font-size: 120% !important;
    }
    p, ul, li {
        color: grey !important;
        font-size: 110% !important;
    }
    .bottom-pad {
        padding-bottom: 60px !important;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Termos de Serviço - PolarAR') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 p-4">

        <h1 class="text-white text-center font_180">Leia nossos termos de uso</h1>
        <h2 class="text-white text-center font_80 bottom-pad">Cadastrando em nossa plataforma, você confirma que <strong>Leu nossos Termos</strong></h2>

        <h3 class="font-semibold text-lg text-gray-800">1. Aceitação dos Termos</h3>
        <p>Ao acessar e utilizar a plataforma <strong>PolarAR</strong>, você concorda em cumprir e estar vinculado a estes Termos de Uso. Caso não concorde, não utilize o sistema.</p>

        <h3 class="font-semibold text-lg text-gray-800">2. Descrição do Serviço</h3>
        <p>O <strong>PolarAR</strong> é uma plataforma que conecta clientes a prestadores de serviços domésticos, permitindo a contratação de serviços como limpeza, cuidados domésticos, culinária e outros serviços de forma prática e segura.</p>

        <h3 class="font-semibold text-lg text-gray-800">3. Registro e Conta de Usuário</h3>
        <p>Para acessar os serviços do <strong>PolarAR</strong>, é necessário criar uma conta. Você concorda em fornecer informações precisas e atualizadas durante o registro e a manter a confidencialidade de sua senha.</p>

        <h3 class="font-semibold text-lg text-gray-800">4. Responsabilidades dos Usuários</h3>
        <p>Ao contratar serviços através do <strong>PolarAR</strong>, você se compromete a:</p>
        <ul>
            <li>Respeitar os prestadores, proporcionando um ambiente seguro e cordial.</li>
            <li>Descrever de forma clara e precisa os serviços desejados.</li>
            <li>Efetuar o pagamento conforme combinado e dentro do prazo acordado.</li>
        </ul>

        <h3 class="font-semibold text-lg text-gray-800">5. Termos de Contratação</h3>
        <p>As contratações realizadas no <strong>PolarAR</strong> representam um acordo entre o usuário e o prestador. A plataforma não é responsável por disputas entre as partes, e o usuário deve revisar os termos antes de concluir a contratação.</p>

        <h3 class="font-semibold text-lg text-gray-800">6. Pagamentos e Cancelamentos</h3>
        <p>O pagamento dos serviços <strong>NÃO</strong> é processado pela plataforma <strong>PolarAR</strong>, e o usuário concorda em pagar o serviço contratado de forma consistente. Cancelamentos devem seguir as políticas da plataforma.</p>

        <h3 class="font-semibold text-lg text-gray-800">7. Propriedade Intelectual</h3>
        <p>Todos os conteúdos, marcas e tecnologias associados ao <strong>PolarAR</strong> são de propriedade exclusiva da empresa e estão protegidos por leis de propriedade intelectual. O uso não autorizado é proibido.</p>

        <h3 class="font-semibold text-lg text-gray-800">8. Limitação de Responsabilidade</h3>
        <p>O <strong>PolarAR</strong> não se responsabiliza por danos diretos ou indiretos resultantes do uso da plataforma. O usuário assume o risco ao utilizar o sistema.</p>

        <h3 class="font-semibold text-lg text-gray-800">9. Alterações nos Termos</h3>
        <p>O <strong>PolarAR</strong> reserva-se o direito de modificar estes Termos de Uso a qualquer momento. As mudanças serão comunicadas na plataforma, e o uso contínuo após as alterações indica aceitação dos novos termos.</p>

        <h3 class="font-semibold text-lg text-gray-800">10. Lei Aplicável</h3>
        <p>Estes Termos de Uso são regidos pelas leis brasileiras. Qualquer disputa será resolvida nos tribunais competentes da jurisdição aplicável.</p>
    </div>
    @include('layouts.footer')
</x-app-layout>