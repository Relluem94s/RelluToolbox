valiateJson = (inputJson) => {
    try {
        JSON.parse(inputJson);
    } catch (e) {
        return e;
    }
    return "No Errors found in provided JSON";

}

