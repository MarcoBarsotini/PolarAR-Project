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
            {{ __('Política de Privacidade - PolarAR') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-5 p-4">

        <h1 class="text-white text-center font_180">Política de Privacidade</h1>
        <h2 class="text-white text-center font_80 bottom-pad">Ao utilizar nossa plataforma, você aceita nossa Política de Privacidade.</h2>

        <h3 class="font-semibold text-lg text-gray-800">1. Coleta de Informações</h3>
        <p>O <strong>PolarAR</strong> coleta informações pessoais que você nos fornece ao se registrar, tais como nome, e-mail, número de telefone, endereço e dados de pagamento. Essas informações são necessárias para oferecer uma experiência segura e personalizada em nossa plataforma.</p>

        <h3 class="font-semibold text-lg text-gray-800">2. Uso das Informações</h3>
        <p>As informações coletadas são utilizadas para:</p>
        <ul>
            <li>Fornecer e personalizar os serviços oferecidos na plataforma.</li>
            <li>Processar pagamentos de forma segura.</li>
            <li>Enviar comunicações importantes, como confirmações e atualizações de serviços.</li>
            <li>Manter a segurança e integridade do sistema e dos usuários.</li>
        </ul>

        <h3 class="font-semibold text-lg text-gray-800">3. Compartilhamento de Informações</h3>
        <p>O <strong>PolarAR</strong> valoriza sua privacidade e não compartilha suas informações pessoais com terceiros, exceto quando necessário para:</p>
        <ul>
            <li>Processamento de pagamentos, através de provedores seguros e regulamentados.</li>
            <li>Cumprir com obrigações legais ou ordens judiciais.</li>
            <li>Proteger a segurança e os direitos do PolarAR, de seus usuários e de terceiros, conforme permitido ou exigido por lei.</li>
        </ul>

        <h3 class="font-semibold text-lg text-gray-800">4. Segurança das Informações</h3>
        <p>O <strong>PolarAR</strong> adota medidas técnicas e organizacionais para proteger suas informações contra acessos não autorizados, perda, alteração ou divulgação. No entanto, nenhum sistema é completamente seguro e garantimos nosso esforço contínuo para proteger seus dados.</p>

        <h3 class="font-semibold text-lg text-gray-800">5. Retenção de Dados</h3>
        <p>Suas informações serão mantidas enquanto sua conta estiver ativa ou conforme necessário para fornecer nossos serviços. Podemos reter dados para cumprir obrigações legais, resolver disputas ou para fins de segurança.</p>

        <h3 class="font-semibold text-lg text-gray-800">6. Seus Direitos</h3>
        <p>Você tem o direito de acessar, corrigir, ou solicitar a exclusão de suas informações pessoais armazenadas no <strong>PolarAR</strong>. Para exercer esses direitos, entre em contato conosco através dos canais de atendimento disponíveis.</p>

        <h3 class="font-semibold text-lg text-gray-800">7. Cookies e Tecnologias de Rastreamento</h3>
        <p>Utilizamos cookies e tecnologias de rastreamento para melhorar sua experiência em nossa plataforma, permitindo funcionalidades como login automático e personalização. Você pode ajustar as configurações de seu navegador para gerenciar ou desativar cookies.</p>

        <h3 class="font-semibold text-lg text-gray-800">8. Alterações nesta Política</h3>
        <p>O <strong>PolarAR</strong> reserva-se o direito de atualizar esta Política de Privacidade periodicamente. Notificaremos as alterações na plataforma, e o uso contínuo após a atualização indica sua aceitação dos novos termos.</p>

        <h3 class="font-semibold text-lg text-gray-800">9. Contato</h3>
        <p>Se tiver dúvidas ou preocupações sobre nossa Política de Privacidade, entre em contato com o suporte do <strong>PolarAR</strong> pelo nosso canal de atendimento.</p>

    </div>
    @include('layouts.footer')
</x-app-layout>
