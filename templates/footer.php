</body>
</html>

<script>
    function formatPhone(phone) {
        phone = phone.replace(/\D/g, '');
        phone = phone.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        return phone;
    }

    document.getElementById('phone').addEventListener('input', function(event) {
        var input = event.target;
        var startPos = input.selectionStart;
        var formattedValue = formatPhone(input.value);

        input.value = formattedValue;
        var endPos = formattedValue.length - (input.value.length - startPos);
        input.setSelectionRange(endPos, endPos);
    });
</script>