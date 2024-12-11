<h1>Crear Proyecto</h1>
<form>
    <!-- Formulario de creación de proyecto -->
    <h1>Formulario para Evaluar un Árbol</h1>
    <h2>Información Básica</h2>
        <label for="perimeter">Perímetro del tronco (cm):</label>
        <input type="number" id="perimeter" name="perimeter" required>
        <br>

        <label for="height">Altura total (m):</label>
        <input type="number" id="height" name="height" step="0.01" required>
        <br>

        <!-- Factores intrínsecos -->
        <h2>Factores Intrínsecos</h2>
        <label for="roots_superficial">Raíces superficiales (%):</label>
        <input type="number" id="roots_superficial" name="roots_superficial" min="0" max="100" required>
        <br>

        <label for="trunk_inclination">Inclinación del tronco:</label>
        <select id="trunk_inclination" name="trunk_inclination" required>
            <option value="none">Ninguna</option>
            <option value="low">Baja</option>
            <option value="moderate">Moderada</option>
            <option value="high">Alta</option>
        </select>
        <br>

        <label for="sanitary_state">Estado sanitario:</label>
        <select id="sanitary_state" name="sanitary_state" required>
            <option value="excellent">Excelente</option>
            <option value="good">Bueno</option>
            <option value="regular">Regular</option>
            <option value="poor">Malo</option>
        </select>
        <br>

        <!-- Factores extrínsecos -->
        <!-- <h2>Factores Extrínsecos</h2>
        <label for="location">Ubicación:</label>
        <select id="location" name="location" required>
            <option value="parque">Parque</option>
            <option value="jardin">Jardín</option>
            <option value="acera">Acera</option>
            <option value="via">Vía pública</option>
        </select>
        <br> -->

        <label for="visibility">Visibilidad:</label>
        <select id="visibility" name="visibility" required>
            <option value="high">Alta</option>
            <option value="medium">Media</option>
            <option value="low">Baja</option>
            <option value="none">Nula</option>
        </select>
        <br>

        <!-- Factores sociales y ambientales -->
        <h2>Factores Sociales y Ambientales</h2>
        <label for="historical_value">Valor histórico/cultural:</label>
        <select id="historical_value" name="historical_value" required>
            <option value="none">Ninguno</option>
            <option value="low">Bajo</option>
            <option value="medium">Medio</option>
            <option value="high">Alto</option>
        </select>
        <br>

        <label for="shade_value">Provisión de sombra:</label>
        <select id="shade_value" name="shade_value" required>
            <option value="none">Ninguno</option>
            <option value="low">Baja</option>
            <option value="medium">Media</option>
            <option value="high">Alta</option>
        </select>
        <br><br>
</form>