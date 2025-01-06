def generate_html_form(num_inputs, input_types, input_names):
    if len(input_types) != num_inputs or len(input_names) != num_inputs:
        return "Het aantal invoertypes en de namen moeten overeenkomen met het aantal ingevoerde velden."

    html_form = "<form action='/submit' method='post'>\n"

    for i in range(num_inputs):
        if input_types[i] == 'text':
            html_form += f"<label for='{input_names[i]}'>{input_names[i]}:</label>\n"
            html_form += f"<input type='text' id='{input_names[i]}' name='{input_names[i]}'><br>\n"
        elif input_types[i] == 'password':
            html_form += f"<label for='{input_names[i]}'>{input_names[i]}:</label>\n"
            html_form += f"<input type='password' id='{input_names[i]}' name='{input_names[i]}'><br>\n"
        elif input_types[i] == 'email':
            html_form += f"<label for='{input_names[i]}'>{input_names[i]}:</label>\n"
            html_form += f"<input type='email' id='{input_names[i]}' name='{input_names[i]}'><br>\n"
        elif input_types[i] == 'dropdown':
            html_form += f"<label for='{input_names[i]}'>{input_names[i]}:</label>\n"
            html_form += f"<select id='{input_names[i]}' name='{input_names[i]}'>\n"
            html_form += f"<option value='Option 1'>Option 1</option>\n"
            html_form += f"<option value='Option 2'>Option 2</option>\n"
            html_form += f"<option value='Option 3'>Option 3</option>\n"
            html_form += "</select><br>\n"
        elif input_types[i] == 'checkbox':
            html_form += f"<input type='checkbox' id='{input_names[i]}' name='{input_names[i]}'><br>\n"
            html_form += f"<label for='{input_names[i]}'>{input_names[i]}</label><br>\n"
        elif input_types[i] == 'datepicker':
            html_form += f"<label for='{input_names[i]}'>{input_names[i]}:</label>\n"
            html_form += f"<input type='date' id='{input_names[i]}' name='{input_names[i]}'><br>\n"

    html_form += "<input type='submit' value='Submit'></form>"

    return html_form

# Voorbeeld invoer: 3 velden, elk van een ander type
num_inputs = 3
input_types = ['text', 'password', 'dropdown']
input_names = ['Name', 'Password', 'Options']

# Genereren van HTML-formulier
html_form = generate_html_form(num_inputs, input_types, input_names)
print(html_form)
