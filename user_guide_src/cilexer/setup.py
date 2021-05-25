<<<<<<< HEAD
"""
Install and setup CodeIgniter highlighting for Pygments.
"""

from setuptools import setup

entry_points = """
[pygments.lexers]
cilexer = cilexer.cilexer:CodeIgniterLexer
"""

setup(
    name='pycilexer',
    version='0.1',
    description=__doc__,
    author="EllisLab, Inc.",
    packages=['cilexer'],
    install_requires=(
        'sphinx >= 1.0.7',
        'sphinxcontrib-phpdomain >= 0.1.3-1'
    ),
    entry_points=entry_points
)
=======
"""
Install and setup CodeIgniter highlighting for Pygments.
"""

from setuptools import setup

entry_points = """
[pygments.lexers]
cilexer = cilexer.cilexer:CodeIgniterLexer
"""

setup(
    name='pycilexer',
    version='0.1',
    description=__doc__,
    author="EllisLab, Inc.",
    packages=['cilexer'],
    install_requires=(
        'sphinx >= 1.0.7',
        'sphinxcontrib-phpdomain >= 0.1.3-1'
    ),
    entry_points=entry_points
)
>>>>>>> b3f1f4d90d1eabdebbe8975d147371d3590c4858
