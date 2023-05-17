import json
import sys

from sympy import simplify
from sympy.parsing.latex import parse_latex

def compare_expressions(expr1, expr2):
    sympy_expr1 = parse_latex(expr1)
    sympy_expr2 = parse_latex(expr2)
    
    simplified_expr1 = simplify(sympy_expr1)
    simplified_expr2 = simplify(sympy_expr2)
    
    if simplified_expr1 == simplified_expr2:
        result = 1
    else:
        result = 0
        
    json_result = json.dumps({"result": result})
    print(json_result)  

expr1 = sys.argv[1]
expr2 = sys.argv[2]    
compare_expressions(expr1, expr2)
